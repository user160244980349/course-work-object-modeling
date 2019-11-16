@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form role="form" method="post" action="{{ route('products.create') }}">
                    @csrf

                    <div class="card">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <font size="4">Ввод изделия</font>
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
                                                <select id="class" type="select" class="form-control" name="class"
                                                        required>
                                                    @foreach ($classes as $class)
                                                        <option
                                                            value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
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
                                                <input id="name" type="text" class="form-control" name="name" required
                                                       autofocus/>
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
                                                        required>
                                                    @foreach ($types as $type)
                                                        <option
                                                            value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
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
                                    <input type="submit" class="btn btn-primary" value="Создать"/>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
