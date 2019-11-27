@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Предикаты конфигурирования</b>
                            </div>

                            <div class="col d-flex flex-row-reverse">
                                <div class="btn-group-sm">
                                    <a class="btn btn-success"
                                       href="{{ route('web.predicates.create') }}">Добавить</a>
                                    <a class="btn btn-primary"
                                       href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="row">
                                    <div class="col">

                                        @if($predicates->isEmpty())
                                            <div class="d-flex justify-content-center">
                                                <i>Список пуст</i>
                                            </div>
                                        @else
                                            <table class="table table-sm mb-0">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Название</th>
                                                    <th scope="col">Выражение</th>
                                                    <th scope="col">
                                                        <div class="d-flex justify-content-end">Действия</div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($predicates as $predicate)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $predicate->name }}</td>
                                                        <td>{{ $predicate->expression }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-end">

                                                                <form
                                                                        action="{{ route('predicates.delete', ['id' => $predicate->id]) }}"
                                                                        method="post">
                                                                    @csrf
                                                                    @method('delete')

                                                                    <div class="btn-group-sm">
                                                                        <a class="btn btn-outline-primary"
                                                                           href="{{ route('web.predicates.read', ['id' => $predicate->id]) }}">Подробнее</a>
                                                                        <input type="submit"
                                                                               class="btn btn-outline-danger"
                                                                               value="Удалить"/>
                                                                    </div>

                                                                </form>

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
        </div>
    </div>
@endsection