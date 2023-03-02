<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AuthController;
use App\Http\Livewire\User\Auth\SignIn;
use App\Http\Livewire\User\Auth\SignUp;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/sign-in', SignIn::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::view('/links', 'user.link.index')->name('links.index');
    Route::view('/appearances', 'user.appearance.index')->name('appearances.index');

    Route::post('/sign-out', [AuthController::class, 'signout'])->name('sign-out');
});

Route::get('/{user:username_slug}', function($username_slug){
    return view('show', compact('username_slug'));
});

