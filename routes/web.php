<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'metrics'], function () {

        Route::get('index', 'Metrics\MetricWebController@index')->name('web.metrics.index');
        Route::get('create', 'Metrics\MetricWebController@create')->name('web.metrics.create');
        Route::get('read/{id}', 'Metrics\MetricWebController@read')->name('web.metrics.read');
        Route::get('update/{id}', 'Metrics\MetricWebController@update')->name('web.metrics.update');

        Route::post('create', 'Metrics\MetricController@create')->name('metrics.create');
        Route::put('update/{id}', 'Metrics\MetricController@update')->name('metrics.update');
        Route::delete('delete/{id}', 'Metrics\MetricController@delete')->name('metrics.delete');

    });

    Route::group(['prefix' => 'product_classes'], function () {

        Route::get('index', 'Products\ProductClassWebController@index')->name('web.product_classes.index');
        Route::get('create', 'Products\ProductClassWebController@create')->name('web.product_classes.create');
        Route::get('read/{id}', 'Products\ProductClassWebController@read')->name('web.product_classes.read');
        Route::get('update/{id}', 'Products\ProductClassWebController@update')->name('web.product_classes.update');

        Route::post('create', 'Products\ProductClassController@create')->name('product_classes.create');
        Route::put('update/{id}', 'Products\ProductClassController@update')->name('product_classes.update');
        Route::delete('delete/{id}', 'Products\ProductClassController@delete')->name('product_classes.delete');

    });

    Route::group(['prefix' => 'parameter_classes'], function () {

        Route::get('index', 'Parameters\ParameterClassWebController@index')->name('web.parameter_classes.index');
        Route::get('create', 'Parameters\ParameterClassWebController@create')->name('web.parameter_classes.create');
        Route::get('read/{id}', 'Parameters\ParameterClassWebController@read')->name('web.parameter_classes.read');
        Route::get('update/{id}', 'Parameters\ParameterClassWebController@update')->name('web.parameter_classes.update');

        Route::post('create', 'Parameters\ParameterClassController@create')->name('parameter_classes.create');
        Route::put('update/{id}', 'Parameters\ParameterClassController@update')->name('parameter_classes.update');
        Route::delete('delete/{id}', 'Parameters\ParameterClassController@delete')->name('parameter_classes.delete');

    });

    Route::group(['prefix' => 'document_classes'], function () {

        Route::get('index', 'Documents\DocumentClassWebController@index')->name('web.document_classes.index');
        Route::get('create', 'Documents\DocumentClassWebController@create')->name('web.document_classes.create');
        Route::get('read/{id}', 'Documents\DocumentClassWebController@read')->name('web.document_classes.read');
        Route::get('update/{id}', 'Documents\DocumentClassWebController@update')->name('web.document_classes.update');

        Route::post('create', 'Documents\DocumentClassController@create')->name('document_classes.create');
        Route::put('update/{id}', 'Documents\DocumentClassController@update')->name('document_classes.update');
        Route::delete('delete/{id}', 'Documents\DocumentClassController@delete')->name('document_classes.delete');

    });

    Route::group(['prefix' => 'products'], function () {

        Route::get('index', 'Products\ProductWebController@index')->name('web.products.index');
        Route::get('create', 'Products\ProductWebController@create')->name('web.products.create');
        Route::get('read/{id}', 'Products\ProductWebController@read')->name('web.products.read');
        Route::get('update/{id}', 'Products\ProductWebController@update')->name('web.products.update');

        Route::post('create', 'Products\ProductController@create')->name('products.create');
        Route::put('update/{id}', 'Products\ProductController@update')->name('products.update');
        Route::delete('delete/{id}', 'Products\ProductController@delete')->name('products.delete');



        Route::group(['prefix' => '{prod_id}/documents'], function () {

            Route::get('index', 'Documents\DocumentWebController@index')->name('web.documents.index');
            Route::get('create', 'Documents\DocumentWebController@create')->name('web.documents.create');
            Route::get('read/{id}', 'Documents\DocumentWebController@read')->name('web.documents.read');
            Route::get('update/{id}', 'Documents\DocumentWebController@update')->name('web.documents.update');

            Route::post('create', 'Documents\DocumentController@create')->name('documents.create');
            Route::put('update/{id}', 'Documents\DocumentController@update')->name('documents.update');
            Route::delete('delete/{id}', 'Documents\DocumentController@delete')->name('documents.delete');


            Route::group(['prefix' => '{doc_id}/parameters'], function () {

                Route::get('create', 'Parameters\ParameterWebController@createInDoc')->name('web.documents.parameter.create');
                Route::get('read/{id}', 'Parameters\ParameterWebController@readInDoc')->name('web.documents.parameter.read');
                Route::get('update/{id}', 'Parameters\ParameterWebController@updateInDoc')->name('web.documents.parameter.update');

                Route::post('create', 'Parameters\ParameterController@createInDoc')->name('documents.parameter.create');
                Route::put('update/{id}', 'Parameters\ParameterController@updateInDoc')->name('documents.parameter.update');
                Route::delete('delete/{id}', 'Parameters\ParameterController@deleteInDoc')->name('documents.parameter.delete');

            });

        });

        Route::group(['prefix' => '{prod_id}/parameters'], function () {

            Route::get('create', 'Parameters\ParameterWebController@createInProd')->name('web.products.parameter.create');
            Route::get('read/{id}', 'Parameters\ParameterWebController@readInProd')->name('web.products.parameter.read');
            Route::get('update/{id}', 'Parameters\ParameterWebController@updateInProd')->name('web.products.parameter.update');

            Route::post('create', 'Parameters\ParameterController@createInProd')->name('products.parameter.create');
            Route::put('update/{id}', 'Parameters\ParameterController@updateInProd')->name('products.parameter.update');
            Route::delete('delete/{id}', 'Parameters\ParameterController@deleteInProd')->name('products.parameter.delete');

        });

        Route::group(['prefix' => '{prod_id}/positions'], function () {

            Route::get('create', 'ProductPositions\ProductPositionsWebController@create')->name('web.products.positions.create');
            Route::get('read/{id}', 'ProductPositions\ProductPositionsWebController@read')->name('web.products.positions.read');
            Route::get('update/{id}', 'ProductPositions\ProductPositionsWebController@update')->name('web.products.positions.update');

            Route::post('create', 'ProductPositions\ProductPositionsController@create')->name('products.positions.create');
            Route::put('update/{id}', 'ProductPositions\ProductPositionsController@update')->name('products.positions.update');
            Route::delete('delete/{id}', 'ProductPositions\ProductPositionsController@delete')->name('products.positions.delete');

        });

        Route::group(['prefix' => '{prod_id}/configure_parameters'], function () {

            Route::get('create', 'ConfigureParameters\ConfigureParametersWebController@create')->name('web.products.configure.parameters.create');
            Route::get('read/{id}', 'ConfigureParameters\ConfigureParametersWebController@read')->name('web.products.configure.parameters.read');
            Route::get('update/{id}', 'ConfigureParameters\ConfigureParametersWebController@update')->name('web.products.configure.parameters.update');

            Route::post('create', 'ConfigureParameters\ConfigureParametersController@create')->name('products.configure.parameters.create');
            Route::put('update/{id}', 'ConfigureParameters\ConfigureParametersController@update')->name('products.configure.parameters.update');
            Route::delete('delete/{id}', 'ConfigureParameters\ConfigureParametersController@delete')->name('products.configure.parameters.delete');

            Route::group(['prefix' => '{conf_id}/values'], function () {

                Route::get('create', 'ConfigureStrings\ConfigureStringsWebController@create')->name('web.products.configure.strings.create');

                Route::post('create', 'ConfigureStrings\ConfigureStringsController@create')->name('products.configure.strings.create');
                Route::delete('delete/{id}', 'ConfigureStrings\ConfigureStringsController@delete')->name('products.configure.strings.delete');

            });

        });

        Route::group(['prefix' => '{prod_id}/configure_positions'], function () {

            Route::get('index', 'ConfigurePositions\ConfigurePositionsWebController@index')->name('web.products.configure.positions.index');
            Route::get('{id}/read', 'ConfigurePositions\ConfigurePositionsWebController@read')->name('web.products.configure.positions.read');

            Route::get('{id}/step1', 'ConfigurePositions\ConfigurePositionsWebController@step1')->name('web.products.configure.positions.step1');
            Route::get('{id}/step2', 'ConfigurePositions\ConfigurePositionsWebController@step2')->name('web.products.configure.positions.step2');
            Route::get('{id}/step3', 'ConfigurePositions\ConfigurePositionsWebController@step3')->name('web.products.configure.positions.step3');

            Route::post('{id}/step1', 'ConfigurePositions\ConfigurePositionsController@step1')->name('products.configure.positions.step1');
            Route::post('{id}/step2', 'ConfigurePositions\ConfigurePositionsController@step2')->name('products.configure.positions.step2');
            Route::post('{id}/step3', 'ConfigurePositions\ConfigurePositionsController@step3')->name('products.configure.positions.step3');

            Route::delete('{id}/delete', 'ConfigurePositions\ConfigurePositionsController@delete')->name('products.configure.positions.delete');

        });

    });

    Route::group(['prefix' => 'predicates'], function () {

        Route::get('index', 'Predicates\PredicateWebController@index')->name('web.predicates.index');
        Route::get('create', 'Predicates\PredicateWebController@create')->name('web.predicates.create');
        Route::get('read/{id}', 'Predicates\PredicateWebController@read')->name('web.predicates.read');

        Route::post('create', 'Predicates\PredicateController@create')->name('predicates.create');
        Route::delete('delete/{id}', 'Predicates\PredicateController@delete')->name('predicates.delete');

    });

});
