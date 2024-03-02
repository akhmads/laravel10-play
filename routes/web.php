<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\PlayController;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function (){

    Route::get('/play/index', [PlayController::class, 'index'])->name('play.index');
    Route::get('/play/create-post', [PlayController::class, 'createPost'])->name('play.create-post');
    Route::get('/play/delete-post', [PlayController::class, 'deletePost'])->name('play.delete-post');
    Route::get('/play/create-comment', [PlayController::class, 'createComment'])->name('play.create-comment');
    Route::get('/play/clear-post', [PlayController::class, 'clearPost'])->name('play.clear-post');

    Volt::route('/example',             'example/example-table')->name('example.example');
    Volt::route('/example/{id}',        'example/example-form')->name('example.example.form');
    Volt::route('/user-admin',          'admin/admin-table')->name('user.admin');
    Volt::route('/user-admin/{id}',     'admin/admin-form')->name('user.admin.form');
    Volt::route('/user-member',         'member/member-table')->name('user.member');
    Volt::route('/user-member/{id}',    'member/member-form')->name('user.member.form');

});
