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
    
        Route::get('/','DashboardController@index');

        Route::prefix('cliente')->group(function () {
                Route::get('listar','ClienteController@show')->name('lista_cliente');
                Route::get('adicionar','ClienteController@create')->name('adicionar_cliente');
                Route::get('editar','ClienteController@edit')->name('editar_cliente');

                Route::put('update','ClienteController@update')->name('update_cliente');
                Route::post('store','ClienteController@store')->name('strore_cliente');
                Route::delete('destroy','ClienteController@destroy')->name('destroy_cliente');
            });
    

    