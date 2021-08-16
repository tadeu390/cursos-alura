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

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');

Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie')
    ->middleware('autenticador');

Route::post('/series/criar', 'SeriesController@store')
    ->middleware('autenticador');;

Route::delete('/series/{id}', 'SeriesController@destroy')
    ->name('series.apagar')
    ->middleware('autenticador');

Route::get('/series/{serie_id}/temporadas', 'TemporadasController@index')
    ->name('series.temporadas');

Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')
    ->middleware('autenticador');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index')
    ->name('temporadas.episodios');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')
    ->name('episodios.assistir')
    ->middleware('autenticador');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/entrar', 'EntrarController@index')
    ->name('entrar');
Route::post('/entrar', 'EntrarController@entrar')
    ->name('entrar');

Route::get('/registrar', 'RegistrarController@create')
->name('registrar');
Route::post('/registrar', 'RegistrarController@store')
->name('registrar');

Route::get('/sair',  function () {
    Auth::logout();

    return redirect()->route('entrar');
})
->name('sair');

Route::get('/tes', function () {
    echo '<pre>';
    print_r(getenv('DB_DATABASE'));
});
