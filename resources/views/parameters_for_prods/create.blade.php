@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{ route('products.parameter.create', ['prod_id' => $product->id]) }}" method="post">
                    @csrf

                    <div class="card">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <font size="4">Создание параметра изделия</font>
                                </div>
                                <div class="col d-flex flex-row-reverse">
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.products.read', ['id' => $product->id]) }}">Назад</a>
                                        <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <div class="form-group">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label for="class" class="control-label">Классификатор параметра</label>
                                            </div>
                                            <div class="col">
                                                <select id="class" type="select" class="form-control" name="class" disabled>
                                                        <option
                                                            value="{{ $class->id }}">{{ $class->name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label for="name" class="control-label">Название параметра</label>
                                            </div>
                                            <div class="col">
                                                <input id="name" type="text" class="form-control" name="name"
                                                       value="" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label for="type" class="control-label">Тип параметра</label>
                                            </div>
                                            <div class="col">
                                                <select id="type" type="select" class="form-control" name="type" required>
                                                @foreach($types as $type)
                                                    <option
                                                        value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label for="value" class="control-label">Значение параметра</label>
                                            </div>
                                            <div class="col">
                                                <input id="value" type="text" class="form-control" name="value"
                                                       value="" required />
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
                                                        required>
                                                    @foreach ($metrics as $metric)
                                                        <option
                                                            value="{{ $metric->id }}">{{ $metric->name }}, {{ $metric->extended_name }}</option>
                                                    @endforeach
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
                                    <div class="btn-group">
                                        <input type="submit" class="btn btn-primary" value="Создать"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
