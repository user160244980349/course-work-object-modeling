@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Список норм расчета</font>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-success" href="{{ route('web.metrics.create') }}">Создать
                                        новую</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col d-flex justify-content-center">
                                @if($metrics->isEmpty())
                                    <i>Список пуст</i>
                                @else
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Сокращение</th>
                                        <th scope="col">Полное название</th>
                                        <th scope="col">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($metrics as $metric)
                                        <tr>
                                            <th class="col-md-1" scope="row">{{ $loop->iteration }}</th>
                                            <td class="col-md-1">{{ $metric->name }}</td>
                                            <td class="col-md-9">{{ $metric->extended_name }}</td>
                                            <td class="col-md-1"><a class="btn btn-primary"
                                                                    href="{{ route('web.metrics.read', ['id' => $metric->id]) }}">Подробнее</a>
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
