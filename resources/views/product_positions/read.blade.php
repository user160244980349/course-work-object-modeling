@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">
                            <div class="col">
                                <b>Просмотр позиции состава</b>
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

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col">
                                            <label for="product" class="control-label">Изделие на позиции</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <select id="product" class="form-control form-control-sm" name="product"
                                                    disabled>
                                                <option value="{{ $position->content->id }}">{{ $position->content->name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col">
                                            <label for="count" class="control-label">Количество</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input id="count" type="text" class="form-control form-control-sm"
                                                   name="count" value="{{ $position->valuable->value }}" disabled
                                                   autofocus/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-sm btn-primary"
                                           href="{{ route('products.positions.update', ['prod_id' => $product->id, 'id' => $position->id]) }}">Редактировать</a>
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
