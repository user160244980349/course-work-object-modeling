@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Редактирование изделия</b>
                            </div>

                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.products.read', ['id' => $product->id]) }}">Отменить
                                        изменения</a>
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

                                <form role="form" method="post"
                                      action="{{ route('products.update', ['id' => $product->id]) }}">
                                    @csrf
                                    @method('put')

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="class" class="control-label">Классификатор изделия</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <select id="class" type="select" class="form-control form-control-sm"
                                                        name="class"
                                                        disabled>
                                                    <option value="{{ $product->product_class->id }}">{{ $product->product_class->name }}</option>
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
                                                       value="{{ $product->name }}" required/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="type" class="control-label">Тип нормирования</label>
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
                                            <input type="submit" class="btn btn-sm btn-primary" value="Сохранить"/>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
