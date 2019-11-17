@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">
                            <div class="col">
                                <b>Список норм расчета</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-success" href="{{ route('web.metrics.create') }}">Создать
                                        новую</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                @if($metrics->isEmpty())
                                    <div class="d-flex justify-content-center">
                                        <i>Список пуст</i>
                                    </div>
                                @else
                                    <table class="table table-sm mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Сокращение</th>
                                                <th scope="col">Полное название</th>
                                                <th scope="col"><div class="d-flex justify-content-end">Действия</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($metrics as $metric)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $metric->name }}</td>
                                                    <td>{{ $metric->extended_name }}</td>
                                                    <td><div class="col d-flex justify-content-end"><a class="btn btn-sm btn-outline-primary"
                                                                href="{{ route('web.metrics.read', ['id' => $metric->id]) }}">Подробнее</a></div>
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
