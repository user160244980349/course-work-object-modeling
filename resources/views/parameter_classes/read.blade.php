@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Просмотр классификатора параметров</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('web.parameter_classes.index') }}">Назад</a>
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
                                            <label for="class" class="control-label">Название классификатора</label>
                                        </div>
                                        <div class="col">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{ $class->name }}" disabled/>
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
                                      action="{{ route('parameter_classes.delete', ['id' => $class->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.parameter_classes.update', ['id' => $class->id]) }}">Редактировать</a>
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
