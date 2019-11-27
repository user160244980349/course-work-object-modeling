@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Определение предиката конфигурирования</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.predicates.index') }}">Назад</a>
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
                                                <label for="name" class="control-label">Наименование предиката</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <input id="name" class="text form-control" name="name"
                                                       value="Предикат конфигурирования" autofocus/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="expression" class="control-label">Логическое
                                                    выражение</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <textarea spellcheck="false" style="resize:none" id="expression"
                                                          type="textarea" class="form-control" name="expression"
                                                          required>{a} + {b} * {c}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Далее"/>
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
