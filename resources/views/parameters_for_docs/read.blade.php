@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Просмотр параметра документа</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-primary"
                                        href="{{ route('web.documents.read', ['prod_id' => $product->id, 'id' => $document->id]) }}">Назад</a>
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
                                                    value="{{ $parameter->parameter_class->id }}">{{ $parameter->parameter_class->name }}</option>
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
                                                   value="{{ $parameter->name }}" disabled/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="type" class="control-label">Тип параметра</label>
                                        </div>
                                        <div class="col">
                                            <select id="type" type="select" class="form-control" name="type" disabled>
                                                <option
                                                    value="{{ $parameter->parameter_type->id }}">{{ $parameter->parameter_type->name }}</option>
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
                                                   value="{{ $parameter->valuable->value }}" disabled/>
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
                                                    value="{{ $parameter->metric->id }}">{{ $parameter->metric->name }}, {{ $parameter->metric->extended_name }}</option>
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
                                    <a class="btn btn-primary"
                                       href="{{ route('web.documents.parameter.update', ['prod_id' => $product->id, 'doc_id' => $document->id, 'id' => $parameter->id]) }}">Редактировать</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
