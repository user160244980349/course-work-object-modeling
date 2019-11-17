@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-body">
                        <div class="card-title">

                            <div class="row">

                                <div class="col">
                                    <b>Список классификаторов параметров</b>
                                </div>

                                <div class="col d-flex flex-row-reverse">
                                    <div class="btn-group-sm">
                                        <a class="btn btn-success" href="{{ route('web.parameter_classes.create') }}">Создать
                                            новый</a>
                                        <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                @if($classes->isEmpty())
                                    <i>Список пуст</i>
                                @else
                                    <table class="table table-sm mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Название</th>
                                                <th scope="col"><div class="d-flex flex-row-reverse">Действия</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($classes as $class)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $class->name }}</td>
                                                    <td>
                                                        <div class="d-flex flex-row-reverse">
                                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('web.parameter_classes.read', ['id' => $class->id]) }}">Подробнее</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
