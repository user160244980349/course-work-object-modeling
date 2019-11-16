@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form role="form" method="post" action="{{ route('products.update', ['id' => $product->id]) }}">
                    @csrf
                    @method('put')

                    <div class="card">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <font size="4">Редактирование изделия</font>
                                </div>
                                <div class="col d-flex flex-row-reverse">
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.products.read', ['id' => $product->id]) }}">Отменить
                                            изменения</a>
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
                                                <select id="class" type="select" class="form-control" name="class"
                                                        disabled>
                                                    <option value="{{ $product->product_class->id }}">{{ $product->product_class->name }}</option>
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
                                                       value="{{ $product->name }}" required/>
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
                                    <input type="submit" class="btn btn-primary" value="Сохранить"/>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
