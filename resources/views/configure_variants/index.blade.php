@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <font size="4">Назначение предиткатов на позиции</font>
                            </div>
                            <div class="col-md-3 d-flex flex-row-reverse">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('web.products.read', ['id' => $product->id]) }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col d-flex justify-content-center">

                                @if($product->predicates->isEmpty())
                                    <i>Список предикатов пуст</i>
                                @else
                                    <table class="table mb-0">
                                        <tbody>
                                        <tr>
                                            <th class="col-md-1" scope="row" colspan="2">Изделие</th>
                                            <th class="col-md-1" scope="row">{{ $product->name }}</th>
                                        </tr>
                                        @foreach ($levels as $level)
                                            @break($loop->last)
                                            <tr>
                                                <th class="col-md-1" scope="row" colspan="4">Уровень {{ $loop->iteration }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Название</th>
                                                <th scope="col">Предикат</th>
                                            </tr>
                                            @foreach($level as $product_in_pos)
                                                @foreach($product_in_pos->positions as $content_position)
                                                    <tr>
                                                        <th class="col-md-1" scope="row">{{ $loop->iteration }}</th>
                                                        <td class="col-md-5"><a href="{{ route('web.products.read', ['id' => $content_position->content->id]) }}">{{ $content_position->content->name }}</a></td>
                                                        @if($content_position->predicates()->where('product_id', '=', $product->id)->exists())
                                                            <td class="col">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <select class="form-control" disabled>
                                                                            <option value="">{{ $content_position->predicates[0]->expression }}</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <form action="{{ route('products.configure.variants.delete', ['prod_id' => $product->id, 'pos_id' => $content_position->id, 'pred_id' => $content_position->predicates[0]->id]) }}" method="post">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <input type="submit" class="btn btn-danger form-control" value="Отменить"/>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @else
                                                            <td class="col">
                                                                <form action="{{ route('products.configure.variants.create', ['prod_id' => $product->id, 'pos_id' => $content_position->id]) }}" method="post">
                                                                    @csrf
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            <select class="form-control" name="predicate">
                                                                                @foreach($product->predicates as $predicate)
                                                                                    <option value="{{ $predicate->id }}">{{ $predicate->expression }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <input type="submit" class="btn btn-success form-control" value="Назначить"/>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
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
