@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Назначение предиткатов на позиции</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary" href="{{ route('web.products.read', ['id' => $product->id]) }}">Назад</a>
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">

                                @if($product->predicates->isEmpty())
                                    <div class="d-flex justify-content-center">
                                        <i>Список пуст</i>
                                    </div>
                                @else
                                    <table class="table table-sm mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" colspan="2">Изделие</th>
                                                <th scope="row">{{ $product->name }}</th>
                                            </tr>
                                            @foreach ($levels as $level)
                                                @break($loop->last)
                                                <tr>
                                                    <th scope="row" colspan="4">Уровень {{ $loop->iteration }}</th>
                                                </tr>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Название</th>
                                                    <th scope="col"><div class="d-flex justify-content-end">Предикат</div></th>
                                                </tr>
                                                @foreach($level as $product_in_pos)
                                                    @foreach($product_in_pos->positions as $content_position)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>
                                                                <a href="{{ route('web.products.read', ['id' => $content_position->content->id]) }}">{{ $content_position->content->name }}</a>
                                                            </td>
                                                            @if($content_position->predicates()->where('product_id', '=', $product->id)->exists())
                                                                <td>
                                                                    <div class="d-flex justify-content-end">
                                                                        <select class="form-control form-control-sm" disabled>
                                                                            <option value="">{{ $content_position->predicates[0]->expression }}</option>
                                                                        </select>
                                                                        <form action="{{ route('products.configure.variants.delete', ['prod_id' => $product->id, 'pos_id' => $content_position->id, 'pred_id' => $content_position->predicates[0]->id]) }}" method="post">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <input type="submit" class="btn btn-sm btn-danger" value="Отменить"/>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <form action="{{ route('products.configure.variants.create', ['prod_id' => $product->id, 'pos_id' => $content_position->id]) }}" method="post">
                                                                        @csrf
                                                                        <div class="d-flex justify-content-end">
                                                                            <select class="form-control form-control-sm mr-2" name="predicate">
                                                                                @foreach($product->predicates as $predicate)
                                                                                    <option value="{{ $predicate->id }}">{{ $predicate->expression }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <input type="submit" class="btn btn-sm btn-success" value="Назначить"/>
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
