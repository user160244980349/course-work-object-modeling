@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <!-- FIRST CARD FOR MAIN PARAMETERS -->
                <div class="card mb-3">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Просмотр документа</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.products.read', ['id' => $product->id]) }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

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
                                                    name="class" disabled>
                                                <option
                                                        value="{{ $document->document_class->id }}">{{ $document->document_class->name }}</option>
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
                                                   value="{{ $document->name }}" disabled/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">

                                        <form role="form" method="post"
                                              action="{{ route('documents.delete', ['prod_id' => $product->id, 'id' => $document->id]) }}">
                                            @csrf
                                            @method('delete')

                                            <div class="btn-group-sm">
                                                <a class="btn btn-primary"
                                                   href="{{ route('web.documents.update', ['prod_id' => $product->id, 'id' => $document->id]) }}">Редактировать</a>
                                                <input type="submit" class="btn btn-danger" value="Удалить"/>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- SECOND CARD FOR ADDITIONAL PARAMETERS -->
                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Дополнительные параметры</b>
                            </div>

                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group-sm">
                                    <a class="btn btn-success"
                                       href="{{ route('web.documents.parameter.create', ['prod_id' => $product->id, 'doc_id' => $document->id]) }}">Добавить</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="row">
                                    <div class="col">

                                        @if($document->parameters->isEmpty())
                                            <div class="d-flex justify-content-center">
                                                <i>Список пуст</i>
                                            </div>
                                        @else
                                            <table class="table table-sm mb-0">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Название</th>
                                                    <th scope="col">Значение</th>
                                                    <th scope="col">Норма</th>
                                                    <th scope="col">
                                                        <div class="d-flex justify-content-end">Действия</div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($document->parameters as $parameter)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $parameter->name }}</td>
                                                        <td>{{ $parameter->valuable->value }}</td>
                                                        <td>{{ $parameter->metric->name }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-end">

                                                                <form
                                                                        action="{{ route('documents.parameter.delete', ['prod_id' => $product->id, 'doc_id' => $document->id, 'id' => $parameter->id]) }}"
                                                                        method="post">
                                                                    @csrf
                                                                    @method('delete')

                                                                    <div class="btn-group-sm">
                                                                        <a class="btn btn-outline-primary"
                                                                           href="{{ route('web.documents.parameter.read', ['prod_id' => $product->id, 'doc_id' => $document->id, 'id' => $parameter->id]) }}">Подробнее</a>
                                                                        <input type="submit"
                                                                               class="btn btn-outline-danger"
                                                                               value="Удалить"/>
                                                                    </div>

                                                                </form>

                                                            </div>
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
