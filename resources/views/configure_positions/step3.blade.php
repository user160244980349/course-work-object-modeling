@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <form role="form" method="post" action="{{ route('products.configure.positions.step3', ['prod_id' => $product->id, 'id' => $position->id]) }}">
                    @csrf

                    <div class="card">
                        <div class="card-body">

                            <div class="row card-title">

                                <div class="col">
                                    <b>Определение предиката конфигурирования</b>
                                </div>

                                <div class="col d-flex justify-content-end">
                                    <div class="btn-group-sm">
                                        <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="control-label">Наименование предиката</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <input id="name" class="text form-control form-control-sm" name="name" value="{{ $predicate->name }}" disabled/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="expression" class="control-label">Логическое выражение</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <textarea spellcheck="false" style="resize:none" id="expression" type="textarea" class="form-control form-control-sm" name="expression"
                                                       disabled>{{ $predicate->expression }}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="row mb-1">
                                            <div class="col">
                                                <div>Формальный параметр</div>
                                            </div>
                                            <div class="col">
                                                <div>Фактический параметр</div>
                                            </div>
                                            <div class="col">
                                                <div>Значение параметра</div>
                                            </div>
                                        </div>
                                        @foreach($parameters as $parameter)
                                            <div class="row mb-1">
                                                <div class="col">
                                                    <label for='values{{ $loop->iteration }}' class="control-label">{{ $loop->iteration }}. "{{ $parameter->name }}"</label>
                                                </div>
                                                <div class="col">
                                                    <select id='parameters' type="textarea" class="form-control form-control-sm" name='parameters' disabled>
                                                            <option value="{{ $parameter->parameter->id }}">{{ $parameter->parameter->name }}</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <select id='values{{ $loop->iteration }}' type="textarea" class="form-control form-control-sm" name='values[]'>
                                                        @foreach($parameter->parameter->strings as $value)
                                                        <option value="{{ $value->id }}">{{ $value->value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Определить"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
