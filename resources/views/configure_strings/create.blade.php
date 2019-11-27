@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Новое значение параметра конфигурирования</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.products.configure.parameters.read', ['prod_id' => $product->id, 'conf_id' => $parameter->id]) }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <form role="form" method="post" action="">
                            @csrf

                            <div class="row">
                                <div class="col">

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="value" class="control-label">Значение параметра</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <input id="value" type="text" class="form-control form-control-sm"
                                                       name="value" required
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
