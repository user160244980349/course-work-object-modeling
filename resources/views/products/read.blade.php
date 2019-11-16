@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- FIRST CARD FOR MAIN PARAMETERS -->
                <div class="card mb-3">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Просмотр изделия</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('web.products.index') }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="mb-2">Основные параметры</h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="class" class="control-label">Классификатор изделия</label>
                                        </div>
                                        <div class="col">
                                            <select id="class" type="select" class="form-control" name="class" disabled>
                                                <option
                                                    value="{{ $product->product_class->id }}">{{ $product->product_class->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="name" class="control-label">Наименование изделия</label>
                                        </div>
                                        <div class="col">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{ $product->name }}" disabled/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="class" class="control-label">Тип нормирования</label>
                                        </div>
                                        <div class="col">
                                            <select id="type" type="select" class="form-control" name="type"
                                                    disabled>
                                                    <option
                                                        value="{{ $product->value_type->id }}">{{ $product->value_type->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="metric" class="control-label">Норма расчета</label>
                                        </div>
                                        <div class="col">
                                            <select id="metric" type="select" class="form-control" name="metric"
                                                    disabled>
                                                    <option
                                                        value="{{ $product->metric->id }}">{{ $product->metric->name }}, {{ $product->metric->extended_name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col">
                                <form role="form" method="post"
                                      action="{{ route('products.delete', ['id' => $product->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.products.update', ['id' => $product->id]) }}">Редактировать</a>
                                        <input type="submit" class="btn btn-danger" value="Удалить"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- SECOND CARD FOR ADDITIONAL PARAMETERS -->
                <div class="card mb-3">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Дополнительные параметры</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-success"
                                       href="{{ route('web.products.parameter.create', ['prod_id' => $product->id]) }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <div class="row align-items-center mb-0">
                                    <div class="col d-flex justify-content-center">
                                        @if($product->parameters->isEmpty())
                                            <i>Список пуст</i>
                                        @else
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Название</th>
                                                <th scope="col">Значение</th>
                                                <th scope="col">Норма</th>
                                                <th scope="col">Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($product->parameters as $parameter)
                                                <tr>
                                                    <th class="col-md-1" scope="row">{{ $loop->iteration }}</th>
                                                    <td class="col-md-5">{{ $parameter->name }}</td>
                                                    <td class="col-md-5">{{ $parameter->valuable->value }}</td>
                                                    <td class="col-md-1">{{ $parameter->metric->name }}</td>
                                                    <td class="col-md-1">
                                                        <form
                                                            action="{{ route('products.parameter.delete', ['prod_id' => $product->id, 'id' => $parameter->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="btn-group">
                                                                <a class="btn btn-primary"
                                                                   href="{{ route('web.products.parameter.read', ['prod_id' => $product->id, 'id' => $parameter->id]) }}">Подробнее</a>
                                                                <input type="submit" class="btn btn-danger"
                                                                       value="Удалить"/>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- THIRD CARD FOR DOCS -->
                <div class="card mb-3">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Документы изделия</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-success"
                                       href="{{ route('web.documents.create', ['prod_id' => $product->id]) }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <div class="row align-items-center mb-0">
                                    <div class="col d-flex justify-content-center">
                                        @if($product->documents->isEmpty())
                                            <i>Список пуст</i>
                                        @else
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Название</th>
                                                <th scope="col">Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($product->documents as $document)
                                                <tr>
                                                    <th class="col-md-1" scope="row">{{ $loop->iteration }}</th>
                                                    <td class="col-md-10">{{ $document->name }}</td>
                                                    <td class="col-md-1">
                                                        <a class="btn btn-primary"
                                                           href="{{ route('web.documents.read', ['prod_id' => $product->id, 'id' => $document->id]) }}">Подробнее</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @if($product->product_class->terminal_in == 0)
                <!-- FORTH CARD FOR STRUCTURE -->
                <div class="card mb-3">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Состав изделия</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.products.configure.variants.index', ['prod_id' => $product->id]) }}">Конфигурируемые позиции</a>
                                    <a class="btn btn-success"
                                       href="{{ route('web.products.positions.create', ['prod_id' => $product->id]) }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <div class="row align-items-center mb-0">
                                    <div class="col d-flex justify-content-center">
                                        @if($product->positions->isEmpty())
                                            <i>Список пуст</i>
                                        @else
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Название</th>
                                                <th scope="col">Количество</th>
                                                <th scope="col">Норма</th>
                                                <th scope="col">Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($product->positions as $position)
                                                <tr>
                                                    <th class="col-md-1" scope="row">{{ $loop->iteration }}</th>
                                                    <td class="col-md-8"><a href="{{ route('web.products.read', ['id' => $position->content->id])  }}">{{ $position->content->name }}</a></td>
                                                    <td class="col-md-1">{{ $position->valuable->value }}</td>
                                                    <td class="col-md-1">{{ $position->content->metric->name }}</td>
                                                    <td class="col-md-1">
                                                        <form
                                                            action="{{ route('products.positions.delete', ['prod_id' => $product->id, 'id' => $position->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="btn-group">
                                                                <a class="btn btn-primary"
                                                                   href="{{ route('web.products.positions.read', ['prod_id' => $product->id, 'id' => $position->id]) }}">Подробнее</a>
                                                                <input type="submit" class="btn btn-danger"
                                                                       value="Удалить"/>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- FIFTH CARD FOR CONF PARAMS -->
                <div class="card mb-3">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Параметры конфигурирования</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-success"
                                       href="{{ route('products.configure.create', ['prod_id' => $product->id]) }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <div class="row align-items-center mb-0">
                                    <div class="col d-flex justify-content-center">

                                        @if($product->conf_params->isEmpty())
                                            <i>Список пуст</i>
                                        @else
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Название</th>
                                                    <th scope="col">Действия</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($product->conf_params as $param)
                                                    <tr>
                                                        <th class="col-md-1" scope="row">{{ $loop->iteration }}</th>
                                                        <td class="col-md-8">{{ $param->name }}</td>
                                                        <td class="col-md-1">
                                                            <form
                                                                action="{{ route('products.configure.delete', ['prod_id' => $product->id, 'id' => $param->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary" href="{{ route('web.products.configure.read', ['prod_id' => $product->id, 'id' => $param->id]) }}">Подробнее</a>
                                                                    <input type="submit" class="btn btn-danger"
                                                                           value="Удалить"/>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- SIXTH CARD FOR PREDICATES -->
                <div class="card mb-3">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Предикаты конфигурирования</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-success"
                                       href="{{ route('web.products.predicates.step1', ['prod_id' => $product->id]) }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <div class="row align-items-center mb-0">
                                    <div class="col d-flex justify-content-center">

                                        @if($product->predicates->isEmpty())
                                            <i>Список пуст</i>
                                        @else
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Название</th>
                                                    <th scope="col">Действия</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($product->predicates as $predicate)
                                                    <tr>
                                                        <th class="col-md-1" scope="row">{{ $loop->iteration }}</th>
                                                        <td class="col-md-8">{{ $predicate->name }}</td>
                                                        <td class="col-md-1">
                                                            <form
                                                                action="{{ route('products.predicates.delete', ['prod_id' => $product->id, 'id' => $predicate->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary"
                                                                       href="{{ route('web.products.predicates.read', ['prod_id' => $product->id, 'id' => $predicate->id]) }}">Подробнее</a>
                                                                    <input type="submit" class="btn btn-danger"
                                                                           value="Удалить"/>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                @endif

            </div>
        </div>
    </div>
@endsection
