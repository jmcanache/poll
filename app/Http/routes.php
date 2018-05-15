<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Poll2Controller@index');
Route::get('index_edit', ['as' => 'index_edit', 'uses' => 'Poll2Controller@index_edit']);
Route::post('send_mail', ['as' => 'send_mail', 'uses' =>'Poll2Controller@send_mail']);
Route::post('edit_data', ['as' => 'edit_data', 'uses' =>'Poll2Controller@edit_data']);
Route::get('getNextPageInfo/{next_position}/{current_poll}', ['as' => 'getNextPageInfo', 'uses' => 'Poll2Controller@getNextPageInfo']);