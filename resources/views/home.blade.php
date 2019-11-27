@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-4 offset-4">

                <div class="card mb-3">

                    <div class="card-body">
                        <div class="row card-title">
                            <div class="col">
                                <b>Классификаторы и нормы расчета</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    1. <a href="{{ route('web.parameter_classes.index') }}">Классификаторы
                                        параметров</a>
                                </div>
                                <div class="">
                                    2. <a href="{{ route('web.document_classes.index') }}">Классификаторы документов</a>
                                </div>
                                <div class="">
                                    3. <a href="{{ route('web.product_classes.index') }}">Классификаторы изделий</a>
                                </div>
                                <div class="">
                                    4. <a href="{{ route('web.metrics.index') }}">Управление нормами расчетов</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card mb-3">

                    <div class="card-body">
                        <div class="col">
                            <div class="row card-title">
                                <b>Изделия и конфигурирование</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    1. <a href="{{ route('web.products.index') }}">Управление изделиями</a>
                                </div>
                                <div class="">
                                    2. <a href="{{ route('web.predicates.index') }}">Предикаты конфигурирования</a>
                                </div>
                                <div class="">
                                    3. <a href="{{ route('web.build.step1') }}">Сборка варианта конфигурирования</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
