@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Классификатор параметров</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary"
                                       href="{{ route('web.parameter_classes.index') }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                @if(isset($class->parent_class))
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="parent" class="control-label">Родительский классификатор</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <select id="parent" type="select" class="form-control form-control-sm"
                                                        name="parent"
                                                        disabled>
                                                    <option
                                                            value="{{ $class->parent_class->id }}">{{ $class->parent_class->name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col">
                                            <label for="class" class="control-label">Название классификатора</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input id="name" type="text" class="form-control form-control-sm"
                                                   name="name"
                                                   value="{{ $class->name }}" disabled/>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                <form role="form" method="post"
                                      action="{{ route('parameter_classes.delete', ['id' => $class->id]) }}">
                                    @csrf
                                    @method('delete')

                                    <div class="btn-group-sm">
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
