@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                    <div class="card">
                        <div class="card-body">

                            <div class="row card-title">
                                <div class="col">
                                    <b>Новый классификатор изделий</b>
                                </div>

                                <div class="col d-flex justify-content-end">
                                    <div class="btn-group-sm">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.product_classes.index') }}">Назад</a>
                                        <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                    </div>
                                </div>
                            </div>

                            <form role="form" method="post" action="{{ route('product_classes.create') }}">
                                @csrf

                                <div class="row">
                                    <div class="col">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="class" class="control-label">Название классификатора</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input id="name" type="text" class="form-control form-control-sm" name="name" value="Новый классификатор параметров" required
                                                           autofocus/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-check">
                                            <div class="row">
                                                <div class="col">
                                                    <input id="terminal_in" type="checkbox" class="form-check-input" name="terminal_in"
                                                           autofocus/>
                                                    <label for="terminal_in" class="form-check-label">Терминальный по наполнению</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input id="terminal_out" type="checkbox" class="form-check-input" name="terminal_out"
                                                           autofocus/>
                                                    <label for="terminal_out" class="form-check-label">Терминальный по включению</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
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
