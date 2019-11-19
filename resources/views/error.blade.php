@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card border-danger mb-3">
                    <div class="card-body border-danger">

                        <div class="row">
                            <div class="col">
                                <b class="text-danger">Ошибка</b>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="text-danger">
                                    {{ $error_text }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
