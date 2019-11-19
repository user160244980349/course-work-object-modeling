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

                                @if($levels[0]->isEmpty())
                                    <div class="d-flex justify-content-center">
                                        <i>Состав изделия пуст</i>
                                    </div>
                                @else
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
{{--                                                            {{ $content_position->valuable->value }}--}}
                                                        </td>
                                                        <td>
{{--                                                            {{ $content_position->content->metric->name }}--}}
                                                        </td>
                                                    </tr>
                                                @endforeach
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
