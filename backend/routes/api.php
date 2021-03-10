<?php

//Rotas de Linguagem
    Route::get('linguagens','LinguagemController@index');
    Route::get('linguagens/{id}','LinguagemController@show');
    Route::post('linguagens', 'LinguagemController@store');
    Route::put('linguagens/{id}', 'LinguagemController@update');
    Route::delete('linguagens/{id}','LinguagemController@destroy');

//Rotas de Vagas
    Route::get('vagas','VagasController@index');
    Route::get('vagas/{id}','VagasController@getById');
    Route::delete('vagas/{id}','VagasController@destroy');
    Route::put('vagas/{id}', 'VagasController@update');
    Route::post('vagas', 'VagasController@insertSolo');


//Rotas de Candidatos
    Route::get('candidatos','CandidatosController@getAll');
    Route::get('candidatos/{id}','CandidatosController@getById');
    Route::delete('candidatos/{id}','CandidatosController@delete');
    Route::put('candidatos/{id}', 'CandidatosController@update');
    Route::post('candidatos', 'CandidatosController@insert');

//Rotas de Linguagens em Vagas
    Route::get('ling-vagas/{id}','LingVagasController@listById');
    Route::delete('ling-vagas/{id}','LingVagasController@deleteLing');
    Route::post('ling-vagas', 'LingVagasController@insertLing');

//Rotas de Linguagens em Candidatos
    Route::get('ling-cand/{id}','LingCandController@listById');
    Route::delete('ling-cand/{id}','LingCandController@deleteLing');
    Route::post('ling-cand', 'LingCandController@insertLing');

    