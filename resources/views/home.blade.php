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
                                    1. <a href="{{ route('web.parameter_classes.index') }}">Классификаторы параметров</a>
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

                <div class="card mb-3">

                    <div class="card-body">
                        <div class="col">
                            <div class="row card-title">
                                <b>TODO</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <i>
                                    1. Открыть выбор класса параметра для дополнительных параметров
                                </i><br>
                                <i>
                                    2. Пронормировать вариант конфигурирования по заданнорму классу
                                </i><br>
                                <i>
                                    3. Пофиксить уведомления об отсутствии параметров конфигурирования при редактировании позиций
                                </i><br>
                                <i>
                                    4. М/б улучшить вывод там немного грязно
                                </i><br>
                                <i>
                                    5. Подумать про целостность при удалении чего либо
                                </i><br>
                                <strike style="text-align: justify-all">
                                    6. Убрать формальные параметры из предикатов и всунуть в экземпляр предиката
                                </strike>
                                <strike>
                                    7. Сверстать страницу сборки варианта конфигурирования
                                </strike><br>
                                <strike>
                                    8. В бэкэнде собрать сборку и отрисовать на страницу
                                </strike>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
