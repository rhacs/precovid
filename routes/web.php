<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    Route::get('/', 'IndexController@index');

    Auth::routes();

    Route::get('/faq', 'FaqController@index')->name('faq');
    Route::get('/terminos', 'TerminosController@index')->name('terminos');
    Route::get('/privacidad', 'PrivacidadController@index')->name('privacidad');
    Route::get('/donaciones', 'DonacionesController@index')->name('donaciones');

    Route::get('/evaluacion', 'EvaluacionController@create')->name('evaluacion');
    Route::post('/evaluacion', 'EvaluacionController@store')->name('evaluacion_store');
    Route::get('/evaluacion/positivo', 'EvaluacionController@positivo')->name('evaluacion_positivo');
    Route::get('/evaluacion/negativo', 'EvaluacionController@negativo')->name('evaluacion_negativo');

    Route::get('/recomendaciones/positivo', 'RecomendacionesController@positivo')->name('recomendaciones_positivo');
    Route::get('/recomendaciones/negativo', 'RecomendacionesController@negativo')->name('recomendaciones_negativo');
