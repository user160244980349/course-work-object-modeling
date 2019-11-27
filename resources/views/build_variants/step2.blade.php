@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row card-title">

                            <div class="col">
                                <b>Конфигурирование изделия</b>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <div class="btn-group-sm">
                                    <a class="btn btn-primary" href="{{ route('home') }}">На главную</a>
                                </div>
                            </div>

                        </div>

                        <form role="form" method="post" action="{{ route('build.step2') }}">
                            @csrf

                            @foreach($product->conf_params as $parameter)
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="parameters{{ $loop->iteration }}"
                                                   class="control-label">{{ $parameter->name }}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control form-control-sm"
                                                    name="parameters[{{ $parameter->id }}]"
                                                    id="parameters{{ $loop->iteration }}">
                                                @foreach($parameter->strings as $value)
                                                    <option value="{{ $value->id }}">{{ $value->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row">
                                <div class="col">
                                    <input type="submit" class="btn btn-sm btn-primary" value="Собрать"/>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
