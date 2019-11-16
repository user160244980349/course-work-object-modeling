@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Список классификаторов изделий</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-success" href="{{ route('web.product_classes.create') }}">Создать
                                        новый</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col d-flex justify-content-center">
                                @if($classes->isEmpty())
                                    <i>Список пуст</i>
                                @else
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($classes as $class)
                                        <tr>
                                            <th class="col-md-1" scope="row">{{ $loop->iteration }}</th>
                                            <td class="col-md-10">{{ $class->name }}</td>
                                            <td class="col-md-1"><a class="btn btn-primary"
                                                                    href="{{ route('web.product_classes.read', ['id' => $class->id]) }}">Подробнее</a>
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
