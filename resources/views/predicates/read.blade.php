@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Определение предиката конфигурирования</b>
                            </div>

                            <div class="col-md-3 d-flex justify-content-end">
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
                                    @foreach($predicate->formal_parameters as $parameter)
                                        <div class="row mb-1">
                                            <div class="col">
                                                <label for='parameters{{ $loop->iteration }}' class="control-label">{{ $loop->iteration }}. "{{ $parameter->name }}"</label>
                                            </div>
                                            <div class="col">
                                                <select style="resize:none" id='parameters{{ $loop->iteration }}' type="textarea" class="form-control form-control-sm" name='parameters[]' disabled>
                                                        <option value="{{ $parameter->actual_parameter->id }}">{{ $parameter->actual_parameter->name }}</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select style="resize:none" id='parameters{{ $loop->iteration }}' type="textarea" class="form-control form-control-sm" name='parameters[]' disabled>
                                                    <option value="{{ $parameter->actual_value->id }}">{{ $parameter->actual_value->value }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-sm btn-primary" href="{{ route('web.products.read', ['id' => $product->id]) }}">Назад</a>
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
