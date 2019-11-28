@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Создание документа</b>
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
                              action="{{ route('documents.create', ['prod_id' => $product->id]) }}">
                            @csrf


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

                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="control-label">Название документа</label>
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
