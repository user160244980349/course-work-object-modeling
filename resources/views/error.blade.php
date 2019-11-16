@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-danger mb-3">
                    <div class="card-header border-danger">
                        <div class="row">
                            <div class="col">
                                <font size="3" class="text-danger">Ошибка</font>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-danger">
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
