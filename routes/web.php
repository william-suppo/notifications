<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', function () {
    Auth::login(User::first());

    return redirect('/');
})->name('login');

Route::get('logout', function () {
    Auth::logout();

    return redirect('/');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('notifications', [\App\Http\Controllers\NotificationController::class, 'index']);

    Route::get('orders', [\App\Http\Controllers\OrderController::class, 'index']);
    Route::post('orders/pay', [\App\Http\Controllers\OrderController::class, 'pay']);
});

Route::group(['middleware' => 'auth', 'prefix' => 'api'], function () {
    Route::get('notifications', [\App\Http\Controllers\Api\NotificationController::class, 'index']);
});
