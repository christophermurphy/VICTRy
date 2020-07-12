<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\GithubProjectsController;

Route::get('/', function () {
    return view('welcome');
});

// fetch is used here for recursive humor, but only one level deep
Route::get('/gitFetch', 'GithubProjectsController@saveData');
Route::get('/gitindex', 'GithubProjectsController@index');

