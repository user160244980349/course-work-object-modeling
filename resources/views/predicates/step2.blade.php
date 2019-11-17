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

                        <form role="form" method="post" action="{{ route('products.predicates.step2', ['prod_id' => $product->id]) }}">
                            @csrf

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
                                            <div class="col-md-8">
                                                <div>Фактический параметр</div>
                                            </div>
                                        </div>
                                        @foreach($parameters as $parameter)
                                            <div class="row mb-1">
                                                <div class="col">
                                                    <label for='parameters{{ $loop->iteration }}' class="control-label">{{ $loop->iteration }}. "{{ $parameter->name }}"</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @if($product->conf_params->isEmpty())
                                                        <select style="resize:none" id='parameters{{ $loop->iteration }}' type="textarea" class="form-control form-control-sm" name='parameters[]' disabled></select>
                                                    @else
                                                    <select style="resize:none" id='parameters{{ $loop->iteration }}' type="textarea" class="form-control form-control-sm" name='parameters[]'>
                                                        @foreach($product->conf_params as $configure_parameter)
                                                            <option value="{{ $configure_parameter->id }}">{{ $configure_parameter->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Далее"/>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
