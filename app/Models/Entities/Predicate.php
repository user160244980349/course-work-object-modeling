<?php

namespace App\Models\Entities;

use App\Exceptions\ArithmeticException;
use Illuminate\Database\Eloquent\Model;

class Predicate extends Model
{
    protected $guarded = ['id'];
    protected $expressionToPlaceValues;

    public function instances()
    {
        return $this->hasMany('App\Models\Entities\PredicateInstance');
    }

    public function replaceWith($parameter, $value)
    {
        if (!isset($this->expressionToPlaceValues)) {
            $this->flushExpression();
        }

        $this->expressionToPlaceValues = preg_replace("/\{$parameter\}/", $value, $this->expressionToPlaceValues);

        return;
    }

    public function flushExpression()
    {
        $this->expressionToPlaceValues = $this->expression;
    }

    public function getExpression()
    {
        return $this->expressionToPlaceValues;
    }

    public function parameter_names()
    {
        $parameters_names = array();
        preg_match_all('/{([a-zA-Z0-9]+)}/', $this->expression, $parameters_names);
        $parameters_names = array_unique($parameters_names[1]);

        return $parameters_names;
    }

    public function calculate()
    {
        // Собственно сам вычислитель выражений

        try {

            if (!is_string($this->expressionToPlaceValues)) {
                throw new ArithmeticException('Wrong type', 1);
            }
            $calculationQueue = array();
            $operationStack = array();
            $operationPriority = array(
                '(' => 0,
                ')' => 0,
                '+' => 1,
                '*' => 2,
                '!' => 3,
            );
            $token = '';
            foreach (str_split($this->expressionToPlaceValues) as $char) {
                // Если цифра, то собираем из цифр число
                if ($char >= '0' && $char <= '9') {
                    $token .= $char;
                } else {
                    // Если число накопилось, сохраняем в очереди вычисления
                    if (strlen($token)) {
                        array_push($calculationQueue, $token);
                        $token = '';
                    }
                    // Если найденный символ - операция (он есть в списке приоритетов)
                    if (isset($operationPriority[$char])) {
                        if (')' == $char) {
                            // Если символ - закрывающая скобка, переносим операции из стека в очередь вычисления пока не встретим открывающую скобку
                            while (!empty($operationStack)) {
                                $operation = array_pop($operationStack);
                                if ('(' == $operation) {
                                    break;
                                }
                                array_push($calculationQueue, $operation);
                            }
                            if ('(' != $operation) {
                                // Упс! А открывающей-то не было. Сильно ругаемся (18+)
                                throw new ArithmeticException('Unexpected ")"', 2);
                            }
                        } else {
                            // Встретили операцию кроме скобки. Переносим операции с меньшим приоритетом в очередь вычисления
                            while (!empty($operationStack) && '(' != $char) {
                                $operation = array_pop($operationStack);
                                if ($operationPriority[$char] > $operationPriority[$operation]) {
                                    array_push($operationStack, $operation);
                                    break;
                                }
                                if ('(' != $operation) {
                                    array_push($calculationQueue, $operation);
                                }
                            }
                            // Кладем операцию на стек операций
                            array_push($operationStack, $char);
                        }
                    } elseif (strpos(' ', $char) !== FALSE) {
                        // Игнорируем пробелы (можно добавить что еще игнорируем)
                    } else {
                        // Встретили что-то непонятное (мы так не договаривались). Опять ругаемся
                        throw new ArithmeticException('Unexpected symbol "' . $char . '"', 3);
                    }
                }

            }
            // Вроде все разобрали, но если остались циферки добавляем их в очередь вычисления
            if (strlen($token)) {
                array_push($calculationQueue, $token);
                $token = '';
            }
            // ... и оставшиеся в стеке операции
            if (!empty($operationStack)) {
                while ($operation = array_pop($operationStack)) {
                    if ('(' == $operation) {
                        // ... кроме открывающих скобок. Это верный признак отсутствующей закрывающей
                        throw new ArithmeticException('Unexpected "("', 4);
                    }
                    array_push($calculationQueue, $operation);
                }
            }
            $calcStack = array();
            // Теперь вычисляем все то, что напарсили
            // Тут ошибки не ловил, но они могут быть (это домашнее задание)
            foreach ($calculationQueue as $token) {
                switch ($token) {
                    case '!':
                        $arg1 = array_pop($calcStack);
                        array_push($calcStack, !$arg1);
                        break;
                    case '+':
                        $arg2 = array_pop($calcStack);
                        $arg1 = array_pop($calcStack);
                        array_push($calcStack, $arg1 || $arg2);
                        break;
                    case '*':
                        $arg2 = array_pop($calcStack);
                        $arg1 = array_pop($calcStack);
                        array_push($calcStack, $arg1 && $arg2);
                        break;
                    default:
                        array_push($calcStack, $token);
                }
            }

        } catch (ArithmeticException $exception) {

            return $exception;
        }

        $this->flushExpression();

        return array_pop($calcStack);
    }

}
