@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Новая норма расчета</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.metrics.index') }}">К списку</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <form role="form" method="post" action="{{ route('metrics.create') }}">
                            @csrf

                            <div class="row">
                                <div class="col">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="control-label">Наименование нормы расчета</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input id="name" type="text" class="form-control form-control-sm" name="name" required
                                                       autofocus/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="extended_name" class="control-label">Полное наименование</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input id="extended_name" type="text" class="form-control form-control-sm" name="extended_name" required
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
