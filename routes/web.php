<?php

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('inicio', 'HomeController');
Route::resource('prospectos', 'LeafletController');
Route::resource('clientes', 'ClientController');
Route::resource('cotizaciones', 'QuoteController');
Route::resource('reportes', 'ReportesController');
Route::resource('usuarios', 'UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rutas de adicionales
Route::post('agregar_seguimiento','QuoteController@agregar_seguimiento');

