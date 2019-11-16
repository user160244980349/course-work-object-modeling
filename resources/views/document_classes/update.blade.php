@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form role="form" method="post"
                      action="{{ route('document_classes.update', ['id' => $class->id]) }}">
                    @csrf
                    @method('put')

                    <div class="card">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <font size="4">Редактирование классификатора документов</font>
                                </div>
                                <div class="col d-flex flex-row-reverse">
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                           href="{{ route('web.document_classes.read', ['id' => $class->id]) }}">Отменить
                                            изменения</a>
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
                                                       value="{{ $class->name }}"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col">
                                    <input class="btn btn-primary" type="submit" name="" value="Сохранить"/>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
