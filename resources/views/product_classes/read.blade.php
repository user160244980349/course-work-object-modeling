@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Просмотр классификатора изделий</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('web.product_classes.index') }}">Назад</a>
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
                                            <label for="class" class="control-label">Название классификатора</label>
                                        </div>
                                        <div class="col">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{ $class->name }}" disabled/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="terminal_in" class="control-label">Терминальный по наполнению</label>
                                        </div>
                                        <div class="col">
                                            <input id="terminal_in" type="checkbox" class="form-control" name="terminal_in"
                                                   @if($class->terminal_in) checked @endif disabled />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <label for="terminal_out" class="control-label">Терминальный по включению</label>
                                        </div>
                                        <div class="col">
                                            <input id="terminal_out" type="checkbox" class="form-control" name="terminal_out"
                                                  @if($class->terminal_out) checked @endif disabled />
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
                                      action="{{ route('product_classes.delete', ['id' => $class->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.product_classes.update', ['id' => $class->id]) }}">Редактировать</a>
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
