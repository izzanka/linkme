<?php

use App\Http\Controllers\UserController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Home;
use App\Livewire\User\Appearance\Index as AppearanceIndex;
use App\Livewire\User\Link\Index as LinkIndex;
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

Route::get('/', Home::class)->name('home');
Route::redirect('/home', '/');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/links', LinkIndex::class)->name('links.index');
    Route::get('/appearance', AppearanceIndex::class)->name('appearance.index');
    Route::post('/sign-out', [UserController::class, 'logout'])->name('logout');
});

Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
