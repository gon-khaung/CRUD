<?php

use App\Http\Controllers\CRUDcontroller;
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

Route::get('/', "CRUDcontroller@index");
Route::POST('/create',"CRUDcontroller@create")->name('create');
Route::POST('/edit/{id}',"CRUDcontroller@edit");
Route::delete('/delete/{id}',"CRUDcontroller@delete");




