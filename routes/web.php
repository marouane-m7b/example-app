<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{nom}/{prenom?}/{age?}', function ($nom, $prenom = 'mahboub', $age = "20") {
    return "Je m'appelle " . $nom . " " . $prenom . ",j'ai " . $age . " ans";
});

// Route::group([
//     'namespace' => 'Admin',
//     'middleware' => 'admin',
//     'prefix' => 'admin'
// ], function () {
//     // something.dev/admin
//     // 'App\Http\Controllers\Admin\IndexController‘
//     // Uses admin middleware
//     Route::get('/', ['uses' => 'IndexController@index']);
//     // something.dev/admin/logs
//     // 'App\Http\Controllers\Admin\LogsController'
//     // Uses admin middleware
//     Route::get('/logs', ['uses' => 'LogsController@index']);
// });

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => 'admin',
    'name'=>'admin.'
], function () {
    Route::fallback(function(){
        return view('adminnotfound');
    });
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/logs', 'LogsController@index')->name('logs');
});


Route::fallback(function(){
    return view('found');
});


// Route::view('/hello', 'hello');
