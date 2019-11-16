@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Просмотр позиции состава</font>
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

                                <div class="form-group">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="product" class="control-label">Изделие на позиции</label>
                                        </div>
                                        <div class="col">
                                            <select id="product" class="form-control" name="product" disabled>
                                                    <option value="{{ $position->content->id }}">{{ $position->content->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="count" class="control-label">Количество</label>
                                        </div>
                                        <div class="col">
                                            <input id="count" type="text" class="form-control" name="count" value="{{ $position->valuable->value }}" disabled
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
                                <a class="btn btn-primary"
                                   href="{{ route('products.positions.update', ['prod_id' => $product->id, 'id' => $position->id]) }}">Редактировать</a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
