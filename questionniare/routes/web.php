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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/questionnaire/create', 'QuestionnaireController@create');
Route::post('/questionnaires', 'QuestionnaireController@store')->name('questionnaire.store');
Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show')->name('questionnaire.show');
Route::patch('questionnaires/status/{questionnaire}', 'QuestionnaireController@update');

Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create')->name('questions.create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store')->name('questions.store');

Route::get('/questionnaires/{questionnaire}/responses/create', 'ResponseController@create')->name('responses.create');
Route::get('/questionnaires/responses/show', 'ResponseController@show')->name('responses.show');
Route::post('/questionnaires/{questionnaire}/response', 'ResponseController@store');
Route::delete('responders/{responder}', 'ResponseController@destroy')->name('responders.destroy');