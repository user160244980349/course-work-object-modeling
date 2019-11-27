@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Состав сборки</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                <table class="table table-sm mb-0">
                                    <tbody>
                                    <tr>
                                        <th scope="row" colspan="3">Изделие</th>
                                        <th scope="row" colspan="1">
                                            <div class="d-flex justify-content-end">
                                                {{ $product->name }}
                                            </div>
                                        </th>
                                    </tr>
                                    @if (!isset($levels[1]))
                                        <tr>
                                            <td scope="row" colspan="4"><i class="d-flex justify-content-center">Состав
                                                    изделия пуст</i></td>
                                        </tr>
                                    @endif
                                    @foreach ($levels as $level)
                                        @continue($loop->first)
                                        <tr>
                                            <th scope="row" colspan="4">Уровень {{ $loop->index }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">#</th>
                                            <th scope="col">Название</th>
                                            <th scope="col">Количество</th>
                                            <th scope="col">Норма</th>
                                        </tr>
                                        @foreach($level as $product_in_pos)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <a href="{{ route('web.products.read', ['id' => $product_in_pos->id]) }}">{{ $product_in_pos->name }}</a>
                                                </td>
                                                <td>
                                                    {{ $product_in_pos->count }}
                                                </td>
                                                <td>
                                                    {{ $product_in_pos->metric->name }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
