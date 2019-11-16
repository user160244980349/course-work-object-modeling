@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form role="form" method="post" action="">
                    @csrf

                    <div class="card">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <font size="4">Новое значение параметра конфигурирования</font>
                                </div>
                                <div class="col-md-3 d-flex flex-row-reverse">
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{ route('web.products.configure.read', ['prod_id' => $product->id, 'conf_id' => $parameter->id]) }}">Назад</a>
                                        <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <div class="form-group mb-0">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label for="value" class="control-label">Значение параметра</label>
                                            </div>
                                            <div class="col">
                                                <input id="value" type="text" class="form-control" name="value" required
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
