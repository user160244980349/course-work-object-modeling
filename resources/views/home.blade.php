@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <font size="3">Классификаторы</font>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    <a href="{{ route('web.parameter_classes.index') }}">Классификаторы параметров</a>
                                </div>
                                <div class="">
                                    <a href="{{ route('web.document_classes.index') }}">Классификаторы документов</a>
                                </div>
                                <div class="">
                                    <a href="{{ route('web.product_classes.index') }}">Классификаторы изделий</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <font size="3">Нормы расчетов</font>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    <a href="{{ route('web.metrics.index') }}">Управление нормами расчетов</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <font size="3">Изделия</font>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    <a href="{{ route('web.products.index') }}">Управление изделиями</a>
                                </div>
                                <div class="">
                                    <a href="">Варианты конфигурирования</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
