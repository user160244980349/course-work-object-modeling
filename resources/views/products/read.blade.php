@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <!-- FIRST CARD FOR MAIN PARAMETERS -->
                <div class="card mb-3">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Просмотр изделия</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary" href="{{ route('web.products.index') }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="row">
                                    <div class="col">
                                        <b class="mb-2">Основные параметры</b>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col">
                                            <label for="class" class="control-label">Классификатор изделия</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <select id="class" type="select" class="form-control form-control-sm"
                                                    name="class" disabled>
                                                <option
                                                        value="{{ $product->product_class->id }}">{{ $product->product_class->name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col">
                                            <label for="name" class="control-label">Наименование изделия</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input id="name" type="text" class="form-control form-control-sm"
                                                   name="name"
                                                   value="{{ $product->name }}" disabled/>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col">
                                            <label for="class" class="control-label">Тип нормирования</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <select id="type" type="select" class="form-control form-control-sm"
                                                    name="type"
                                                    disabled>
                                                <option
                                                        value="{{ $product->value_type->id }}">{{ $product->value_type->name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col">
                                            <label for="metric" class="control-label">Норма расчета</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <select id="metric" type="select" class="form-control form-control-sm"
                                                    name="metric"
                                                    disabled>
                                                <option
                                                        value="{{ $product->metric->id }}">{{ $product->metric->name }}
                                                    , {{ $product->metric->extended_name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">

                                        <form role="form" method="post"
                                              action="{{ route('products.delete', ['id' => $product->id]) }}">
                                            @csrf
                                            @method('delete')

                                            <div class="btn-group-sm">
                                                <a class="btn btn-primary"
                                                   href="{{ route('web.products.update', ['id' => $product->id]) }}">Редактировать</a>
                                                <input type="submit" class="btn btn-danger" value="Удалить"/>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- SECOND CARD FOR ADDITIONAL PARAMETERS -->
                <div class="card mb-3">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Дополнительные параметры</b>
                            </div>

                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group-sm">
                                    <a class="btn btn-success"
                                       href="{{ route('web.products.parameter.create', ['prod_id' => $product->id]) }}">Добавить</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="row">
                                    <div class="col">

                                        @if($product->parameters->isEmpty())
                                            <div class="d-flex justify-content-center">
                                                <i>Список пуст</i>
                                            </div>
                                        @else
                                            <table class="table table-sm mb-0">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Название</th>
                                                    <th scope="col">Значение</th>
                                                    <th scope="col">Норма</th>
                                                    <th scope="col">
                                                        <div class="d-flex justify-content-end">Действия</div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($product->parameters as $parameter)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $parameter->name }}</td>
                                                        <td>{{ $parameter->valuable->value }}</td>
                                                        <td>{{ $parameter->metric->name }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-end">

                                                                <form
                                                                        action="{{ route('products.parameter.delete', ['prod_id' => $product->id, 'id' => $parameter->id]) }}"
                                                                        method="post">
                                                                    @csrf
                                                                    @method('delete')

                                                                    <div class="btn-group-sm">
                                                                        <a class="btn btn-outline-primary"
                                                                           href="{{ route('web.products.parameter.read', ['prod_id' => $product->id, 'id' => $parameter->id]) }}">Подробнее</a>
                                                                        <input type="submit"
                                                                               class="btn btn-outline-danger"
                                                                               value="Удалить"/>
                                                                    </div>
                                                                </form>

                                                            </div>
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
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Документы изделия</b>
                            </div>

                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group-sm">
                                    <a class="btn btn-success"
                                       href="{{ route('web.documents.create', ['prod_id' => $product->id]) }}">Добавить</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="row">
                                    <div class="col">

                                        @if($product->documents->isEmpty())
                                            <div class="d-flex justify-content-center">
                                                <i>Список пуст</i>
                                            </div>
                                        @else
                                            <table class="table table-sm mb-0">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Название</th>
                                                    <th scope="col">
                                                        <div class="d-flex justify-content-end">Действия</div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($product->documents as $document)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $document->name }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-end">
                                                                <a class="btn btn-sm btn-outline-primary"
                                                                   href="{{ route('web.documents.read', ['prod_id' => $product->id, 'id' => $document->id]) }}">Подробнее</a>
                                                            </div>
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
                        <div class="card-body">

                            <div class="row card-title">

                                <div class="col">
                                    <b>Состав изделия</b>
                                </div>

                                <div class="col d-flex flex-row-reverse">
                                    <div class="btn-group-sm">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.products.configure.positions.index', ['prod_id' => $product->id]) }}">Конфигурируемые
                                            позиции</a>
                                        <a class="btn btn-success"
                                           href="{{ route('web.products.positions.create', ['prod_id' => $product->id]) }}">Добавить</a>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">

                                    <div class="row">
                                        <div class="col">

                                            @if($product->positions->isEmpty())
                                                <div class="d-flex justify-content-center">
                                                    <i>Список пуст</i>
                                                </div>
                                            @else
                                                <table class="table table-sm mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Название</th>
                                                        <th scope="col">Количество</th>
                                                        <th scope="col">Норма</th>
                                                        <th scope="col">
                                                            <div class="d-flex justify-content-end">Действия</div>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($product->positions as $position)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>
                                                                <a href="{{ route('web.products.read', ['id' => $position->content->id])  }}">{{ $position->content->name }}</a>
                                                            </td>
                                                            <td>{{ $position->valuable->value }}</td>
                                                            <td>{{ $position->content->metric->name }}</td>
                                                            <td>
                                                                <div class="d-flex justify-content-end">
                                                                    <form
                                                                            action="{{ route('products.positions.delete', ['prod_id' => $product->id, 'id' => $position->id]) }}"
                                                                            method="post">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <div class="btn-group-sm">
                                                                            <a class="btn btn-outline-primary"
                                                                               href="{{ route('web.products.positions.read', ['prod_id' => $product->id, 'id' => $position->id]) }}">Подробнее</a>
                                                                            <input type="submit"
                                                                                   class="btn btn-outline-danger"
                                                                                   value="Удалить"/>
                                                                        </div>

                                                                    </form>
                                                                </div>
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
                        <div class="card-body">

                            <div class="row card-title">

                                <div class="col">
                                    <b>Параметры конфигурирования</b>
                                </div>

                                <div class="col d-flex flex-row-reverse">
                                    <div class="btn-group-sm">
                                        <a class="btn btn-success"
                                           href="{{ route('products.configure.parameters.create', ['prod_id' => $product->id]) }}">Добавить</a>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">

                                    <div class="row">
                                        <div class="col">

                                            @if($product->conf_params->isEmpty())
                                                <div class="d-flex justify-content-center">
                                                    <i>Список пуст</i>
                                                </div>
                                            @else
                                                <table class="table table-sm mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Название</th>
                                                        <th scope="col">
                                                            <div class="d-flex justify-content-end">Действия</div>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($product->conf_params as $param)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $param->name }}</td>
                                                            <td>
                                                                <div class="d-flex justify-content-end">

                                                                    <form
                                                                            action="{{ route('products.configure.parameters.delete', ['prod_id' => $product->id, 'id' => $param->id]) }}"
                                                                            method="post">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <div class="btn-group-sm">
                                                                            <a class="btn btn-outline-primary"
                                                                               href="{{ route('web.products.configure.parameters.read', ['prod_id' => $product->id, 'id' => $param->id]) }}">Подробнее</a>
                                                                            <input type="submit"
                                                                                   class="btn btn-outline-danger"
                                                                                   value="Удалить"/>
                                                                        </div>

                                                                    </form>

                                                                </div>
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
