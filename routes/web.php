<?php

use App\Events\PlayerUpdated;

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



Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/fire', function () {
        event(new PlayerUpdated);
        return 'Fired';
    })->name('fire');

    Route::get('/{any}', 'SpaController@index')->where('any', '.*');

});

