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

Route::get('/','AppController@index');
Route::get('/audience','AppController@audience');
Route::get('/interaction','AppController@interaction');
Route::get('/interaction/questions','AppController@questions');
Route::get('/interaction/quiz','AppController@quiz');
Route::get('/interaction/formulaires','AppController@formulaires');
Route::get('/interaction/autre','AppController@autre');
Route::get('/formulaires/{id}','AppController@showForm');
Route::get('/{user}',function ($user){
  return \App\Medecin::where('id',$user)->with('formulaire')->get()->first();
});
