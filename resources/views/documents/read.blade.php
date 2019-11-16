@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <!-- FIRST CARD FOR MAIN PARAMETERS -->
                <div class="card mb-3">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Просмотр документа</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('web.products.read', ['id' => $product->id]) }}">Назад</a>
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
                                            <label for="class" class="control-label">Классификатор документа</label>
                                        </div>
                                        <div class="col">
                                            <select id="class" type="select" class="form-control" name="class" disabled>
                                                <option
                                                    value="{{ $document->document_class->id }}">{{ $document->document_class->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="name" class="control-label">Название документа</label>
                                        </div>
                                        <div class="col">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{ $document->name }}" disabled/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col">
                                <form role="form" method="post"
                                      action="{{ route('documents.delete', ['prod_id' => $product->id, 'id' => $document->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.documents.update', ['prod_id' => $product->id, 'id' => $document->id]) }}">Редактировать</a>
                                        <input type="submit" class="btn btn-danger" value="Удалить"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- SECOND CARD FOR ADDITIONAL PARAMETERS -->
                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Дополнительные параметры</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-success"
                                       href="{{ route('web.documents.parameter.create', ['prod_id' => $product->id, 'doc_id' => $document->id]) }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <div class="row align-items-center mb-0">
                                    <div class="col d-flex justify-content-center">
                                        @if($document->parameters->isEmpty())
                                            <i>Список пуст</i>
                                        @else
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Название</th>
                                                <th scope="col">Значение</th>
                                                <th scope="col">Норма</th>
                                                <th scope="col">Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($document->parameters as $parameter)
                                                <tr>
                                                    <th class="col-md-1" scope="row">{{ $loop->iteration }}</th>
                                                    <td class="col-md-5">{{ $parameter->name }}</td>
                                                    <td class="col-md-5">{{ $parameter->valuable->value }}</td>
                                                    <td class="col-md-1">{{ $parameter->metric->name }}</td>
                                                    <td class="col-md-1">
                                                        <form
                                                            action="{{ route('documents.parameter.delete', ['prod_id' => $product->id, 'doc_id' => $document->id, 'id' => $parameter->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="btn-group">
                                                                <a class="btn btn-primary"
                                                                   href="{{ route('web.documents.parameter.read', ['prod_id' => $product->id, 'doc_id' => $document->id, 'id' => $parameter->id]) }}">Подробнее</a>
                                                                <input type="submit" class="btn btn-danger"
                                                                       value="Удалить"/>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
