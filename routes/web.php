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
  Route::get('/news',  [\App\Http\Controllers\Admin\NewsController::class, 'index'])
	->name('admin.news');
  Route::get('/news/create',  [\App\Http\Controllers\Admin\NewsController::class, 'create'])
	->name('admin.news.create');
  Route::get('/news/{slug}/{id}/edit',  [\App\Http\Controllers\Admin\NewsController::class, 'edit'])
	->where(['slug' => '\w+', 'id' => '\d+'])
	->name('admin.news.edit');
});