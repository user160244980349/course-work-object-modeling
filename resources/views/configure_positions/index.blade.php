@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Назначение предиткатов на позиции</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.products.read', ['id' => $product->id]) }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                @if($predicates->isEmpty())
                                    <div class="d-flex justify-content-center">
                                        <i>Список предикатов пуст</i>
                                    </div>
                                @else
                                    <table class="table table-sm mb-0">
                                        <tbody>
                                        <tr>
                                            <th scope="row" colspan="4">Изделие</th>
                                            <th scope="row" colspan="1">
                                                <div class="d-flex justify-content-end">
                                                    {{ $product->name }}
                                                </div>
                                            </th>
                                        </tr>
                                        @foreach ($levels as $level)
                                            <tr>
                                                <th scope="row" colspan="5">Уровень {{ $loop->iteration }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Название</th>
                                                <th scope="col">Количество</th>
                                                <th scope="col">Метрика</th>
                                                <th scope="col">
                                                    <div class="d-flex justify-content-end">Действия</div>
                                                </th>
                                            </tr>
                                            @foreach($level as $content_position)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>
                                                            <a href="{{ route('web.products.read', ['id' => $content_position->content_recurse->id]) }}">{{ $content_position->content_recurse->name }}</a>
                                                        </td>
                                                        <td>
                                                            {{ $content_position->valuable->value }}
                                                        </td>
                                                        <td>
                                                            {{ $content_position->content_recurse->metric->name }}
                                                        </td>
                                                        @if($content_position->predicate_instances()->where('product_id', '=', $product->id)->get()->isNotEmpty())
                                                            <td>
                                                                <div class="d-flex justify-content-end">
                                                                    <form action="{{ route('products.configure.positions.delete', ['prod_id' => $product->id, 'id' => $content_position->id]) }}"
                                                                          method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <div class="btn-group-sm">
                                                                            <a class="btn btn-sm btn-outline-primary"
                                                                               href="{{ route('web.products.configure.positions.read', ['prod_id' => $product->id, 'id' => $content_position->id]) }}">Подробнее</a>
                                                                            <input type="submit"
                                                                                   class="btn btn-sm btn-outline-danger"
                                                                                   value="Отменить"/>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <div class="d-flex justify-content-end">
                                                                    <a class="btn btn-sm btn-outline-success"
                                                                       href="{{ route('web.products.configure.positions.step1', ['prod_id' => $product->id, 'id' => $content_position->id]) }}">Назначить
                                                                        предикат</a>
                                                                </div>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
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
    </div>
@endsection
