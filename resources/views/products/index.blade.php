@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Список изделий</b>
                            </div>

                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group-sm">
                                    <a class="btn btn-success" href="{{ route('web.products.create') }}">Ввести
                                        новое</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                @if($products->isEmpty())
                                    <div class="d-flex justify-content-center">
                                        <i>Список пуст</i>
                                    </div>
                                @else
                                    <table class="table table-sm mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Название</th>
                                            <th scope="col">
                                                <div class="d-flex justify-content-end">Действия</div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $product->name }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <a class="btn btn-sm btn-outline-primary"
                                                           href="{{ route('web.products.read', ['id' => $product->id]) }}">Подробнее</a>
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
