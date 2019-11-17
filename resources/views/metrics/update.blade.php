@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                    <div class="card">
                        <div class="card-body">

                            <div class="row card-title">

                                <div class="col">
                                    <b>Редактирование нормы расчета</b>
                                </div>

                                <div class="col d-flex justify-content-end">
                                    <div class="btn-group-sm">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.metrics.read', ['id' => $metric->id]) }}">Отменить
                                            изменения</a>
                                    </div>
                                </div>

                            </div>

                            <form role="form" method="post"
                                  action="{{ route('metrics.update', ['id' => $metric->id]) }}">
                                @csrf
                                @method('put')

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
                                                           value="{{ $metric->name }}"/>
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
                                                           value="{{ $metric->extended_name }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <input class="btn btn-sm btn-primary" type="submit" name="" value="Сохранить"/>
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
