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
                                <b>Просмотр параметра конфигурирования</b>
                            </div>

                            <div class="col-md-3 d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary" href="{{ route('web.products.read', ['id' => $product->id]) }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col">
                                            <label for="class" class="control-label">Классификатор параметра</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <select id="class" type="select" class="form-control form-control-sm" name="class" disabled>
                                                <option
                                                    value="{{ $parameter->parameter_class->id }}">{{ $parameter->parameter_class->name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col">
                                            <label for="name" class="control-label">Название параметра</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input id="name" type="text" class="form-control form-control-sm" name="name"
                                                   value="{{ $parameter->name }}" disabled/>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- SECOND CARD FOR ADDITIONAL PARAMETERS -->
                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Допустимые значения</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-success"
                                       href="{{ route('web.products.configure.strings.create', ['prod_id' => $product->id, 'conf_id' => $parameter->id]) }}">Добавить</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="row">
                                    <div class="col">

                                        @if($parameter->strings->isEmpty())
                                            <div class="d-flex justify-content-center">
                                                <i>Список пуст</i>
                                            </div>
                                        @else
                                        <table class="table table-sm mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Значение</th>
                                                    <th scope="col">Норма</th>
                                                    <th scope="col"><div class="d-flex justify-content-end">Действия</div></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($parameter->strings as $value)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $value->value }}</td>
                                                        <td>{{ $parameter->metric->name }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-end">

                                                                <form
                                                                    action="{{ route('products.configure.strings.delete', ['prod_id' => $product->id, 'conf_id' => $parameter->id, 'id' => $value->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')

                                                                    <div class="btn-group-sm">
                                                                        <input type="submit" class="btn btn-danger"
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

            </div>
        </div>
    </div>
@endsection
