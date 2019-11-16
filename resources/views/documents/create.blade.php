@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form role="form" method="post" action="{{ route('documents.create', ['prod_id' => $product->id]) }}">
                    @csrf

                    <div class="card">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <font size="4">Создание документа</font>
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

                                    <div class="form-group mb-0">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label for="name" class="control-label">Название документа</label>
                                            </div>
                                            <div class="col">
                                                <input id="name" type="text" class="form-control" name="name" required
                                                       autofocus/>
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
