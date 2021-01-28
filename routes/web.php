<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\IndexController;

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



Route::get('/session', function() {
	 $user = ['name' => 'Example3'];
	 session($user);
	 return redirect('session_result');
});
Route::get('session_result', function() {
	if(session()->has('name')) {
		//session()->remove('name');
		dd(session()->get('name'));
	}
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {

	Route::get('/logout', function() {
		Auth::logout();
		return redirect()->route('login');
	})->name('account.logout');
	Route::get('account', [IndexController::class, 'index'])
		->name('account');

	Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
		Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.dashboard');
		Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
	});
});