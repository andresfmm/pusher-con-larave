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

use App\Events\TestEvent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('broadcast', function (){
    
    event(new TestEvent('broadcast enviado'));
    return "si paso";

});

Route::get('comment', function(){
   return view('comentarios.index');
});



Route::post('noti', 'mensaje@noti');
