@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Просмотр нормы расчета</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary" href="{{ route('web.metrics.index') }}">К списку</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <div class="row align-items-center">
                            <div class="col">

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col">
                                            <label for="name" class="control-label">Наименование нормы расчета</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input id="name" type="text" class="form-control form-control-sm" name="name"
                                                   value="{{ $metric->name }}" disabled/>
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
                                            <input id="extended_name" type="text" class="form-control form-control-sm" name="extended_name"
                                                   value="{{ $metric->extended_name }}" disabled/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">

                                        <form role="form" method="post"
                                              action="{{ route('metrics.delete', ['id' => $metric->id]) }}">
                                            @csrf
                                            @method('delete')

                                            <div class="btn-group-sm">
                                                <a class="btn btn-primary"
                                                   href="{{ route('web.metrics.update', ['id' => $metric->id]) }}">Редактировать</a>
                                                <input type="submit" class="btn btn-danger" value="Удалить"/>
                                            </div>

                                        </form>

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
