@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Просмотр нормы расчета</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('web.metrics.index') }}">Назад</a>
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
                                            <label for="name" class="control-label">Наименование нормы расчета</label>
                                        </div>
                                        <div class="col">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{ $metric->name }}" disabled/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="extended_name" class="control-label">Полное наименование</label>
                                        </div>
                                        <div class="col">
                                            <input id="extended_name" type="text" class="form-control" name="extended_name"
                                                   value="{{ $metric->extended_name }}" disabled/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col">
                                <form role="form" method="post"
                                      action="{{ route('metrics.delete', ['id' => $metric->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group">
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
@endsection
