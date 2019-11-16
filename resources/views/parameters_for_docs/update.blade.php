@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{ route('documents.parameter.update', ['prod_id' => $product->id, 'doc_id' => $document->id, 'id' => $parameter->id]) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="card">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <font size="4">Редактирование параметра документа</font>
                                </div>
                                <div class="col-md-3 d-flex flex-row-reverse">
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.documents.parameter.read', ['prod_id' => $product->id, $document->id, 'id' => $parameter->id]) }}">Отменить изменения</a>
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
@endsection
