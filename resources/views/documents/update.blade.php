@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Редактирование документа</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.documents.read', ['prod_id' => $product->id, 'id' => $document->id]) }}">Отменить
                                        изменения</a>
                                </div>
                            </div>

                        </div>

                        <form role="form" method="post"
                              action="{{ route('documents.update', ['prod_id' => $product->id, 'id' => $document->id]) }}">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col">

                                    <div class="row">
                                        <div class="col">
                                            <b class="mb-2">Основные параметры</b>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="class" class="control-label">Классификатор документа</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <select id="class" type="select" class="form-control form-control-sm"
                                                        name="class"
                                                        disabled>
                                                    <option value="{{ $document->document_class->id }}">{{ $document->document_class->name }}</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="control-label">Название документа</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <input id="name" type="text" class="form-control form-control-sm"
                                                       name="name"
                                                       value="{{ $document->name }}" required/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Сохранить"/>
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
