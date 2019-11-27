@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Новая позиция состава</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.products.read', ['prod_id' => $product->id]) }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <form role="form" method="post"
                              action="{{ route('web.products.positions.create', ['prod_id' => $product->id]) }}">
                            @csrf

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
                                                <select id="product" class="form-control form-control-sm"
                                                        name="product">
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
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
                                                       name="count" required
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
