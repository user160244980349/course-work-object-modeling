@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Создание параметра конфигурирования</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.products.read', ['id' => $product->id]) }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <form role="form" method="post"
                              action="{{ route('products.configure.parameters.create', ['prod_id' => $product->id]) }}">
                            @csrf

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
                                                <select id="class" type="select" class="form-control form-control-sm"
                                                        name="class"
                                                        disabled>
                                                    <option
                                                            value="{{ $class->id }}">{{ $class->name }}</option>
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
                                                <input id="name" type="text" class="form-control form-control-sm"
                                                       name="name" required
                                                       autofocus/>
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
                                                        required>
                                                    @foreach ($metrics as $metric)
                                                        <option
                                                                value="{{ $metric->id }}">{{ $metric->name }}
                                                            , {{ $metric->extended_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Создать"/>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
