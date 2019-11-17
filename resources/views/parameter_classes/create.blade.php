@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">
                        <div class="row card-title">

                            <div class="col">
                                <b>Новый классификатор параметров</b>
                            </div>

                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.parameter_classes.index') }}">К списку</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                            <form role="form" method="post" action="{{ route('parameter_classes.create') }}">
                                @csrf
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

                                <div class="row">
                                    <div class="col">
                                        <input type="submit" class="btn btn-sm btn-primary" value="Создать"/>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
