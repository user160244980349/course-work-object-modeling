@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Добавление параметра документа</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.documents.read', ['prod_id' => $product->id, 'doc_id' => $document->id]) }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <form action="{{ route('documents.parameter.create', ['prod_id' => $product->id, 'doc_id' => $document->id]) }}"
                              method="post">
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
                                                        name="class" required>
                                                    @foreach($classes as $class)
                                                        <option
                                                                value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
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
                                                       name="name"
                                                       value="" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="type" class="control-label">Тип параметра</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <select id="type" type="select" class="form-control form-control-sm"
                                                        name="type" required>
                                                    @foreach($types as $type)
                                                        <option
                                                                value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="value" class="control-label">Значение параметра</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <input id="value" type="text" class="form-control form-control-sm"
                                                       name="value"
                                                       value="" required/>
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
                                            <div class="btn-group-sm">
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
        </div>
    </div>
@endsection
