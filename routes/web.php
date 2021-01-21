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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.dashboard');
  Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
});

Route::get('/collections', function() {
	$chars = [1,2,3,4,5,6,7,8,9];
	$collection = collect($chars);
	dd($collection->map(function ($int) {
		  return $int * 3;
	}));
});