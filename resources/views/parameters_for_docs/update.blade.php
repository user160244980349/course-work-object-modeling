@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                    <div class="card">
                        <div class="card-body">

                            <div class="row card-title">

                                <div class="col">
                                    <b>Редактирование параметра документа</b>
                                </div>

                                <div class="col d-flex justify-content-end">
                                    <div class="btn-group-sm">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.documents.parameter.read', ['prod_id' => $product->id, $document->id, 'id' => $parameter->id]) }}">Отменить изменения</a>
                                    </div>
                                </div>

                            </div>

                            <form action="{{ route('documents.parameter.update', ['prod_id' => $product->id, 'doc_id' => $document->id, 'id' => $parameter->id]) }}" method="post">
                                @csrf
                                @method('put')

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

                                        <div class="form-group">

                                            <div class="row">
                                                <div class="col">
                                                    <label for="type" class="control-label">Тип параметра</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <select id="type" type="select" class="form-control form-control-sm" name="type" disabled>
                                                        <option
                                                            value="{{ $parameter->parameter_type->id }}">{{ $parameter->parameter_type->name }}</option>
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
                                                    <input id="value" type="text" class="form-control form-control-sm" name="value"
                                                           value="{{ $parameter->valuable->value }}" required/>
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
                                                    <select id="metric" type="select" class="form-control form-control-sm" name="metric"
                                                            disabled>
                                                        <option
                                                            value="{{ $parameter->metric->id }}">{{ $parameter->metric->name }}, {{ $parameter->metric->extended_name }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="btn-group-sm">
                                                    <input type="submit" class="btn btn-primary" value="Сохранить"/>
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
