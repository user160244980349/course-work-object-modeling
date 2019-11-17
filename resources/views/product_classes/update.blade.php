@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                    <div class="card">
                        <div class="card-body">

                            <div class="row card-title">

                                <div class="col">
                                    <b>Редактирование классификатора изделий</b>
                                </div>

                                <div class="col d-flex flex-row-reverse">
                                    <div class="btn-group-sm">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.product_classes.read', ['id' => $class->id]) }}">Отменить
                                            изменения</a>
                                    </div>
                                </div>

                            </div>

                            <form role="form" method="post"
                                  action="{{ route('product_classes.update', ['id' => $class->id]) }}">
                                @csrf
                                @method('put')

                                <div class="row align-items-center">
                                    <div class="col">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="class" class="control-label">Название классификатора</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input id="name" type="text" class="form-control form-control-sm" name="name"
                                                           value="{{ $class->name }}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-check">
                                            <div class="row">
                                                <div class="col">
                                                    <input id="terminal_in" type="checkbox" class="form-check-input" name="terminal_in"
                                                           @if($class->terminal_in) checked @endif  />
                                                    <label for="terminal_in" class="form-check-label">Терминальный по наполнению</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input id="terminal_out" type="checkbox" class="form-check-input" name="terminal_out"
                                                           @if($class->terminal_out) checked @endif  />
                                                    <label for="terminal_out" class="form-check-label">Терминальный по включению</label>
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
