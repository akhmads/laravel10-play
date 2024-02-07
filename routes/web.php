<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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

    Volt::route('/example',             'example/example-table')->name('example.example');
    Volt::route('/example/{id}',        'example/example-form')->name('example.example.form');
    Volt::route('/user-admin',          'admin/admin-table')->name('user.admin');
    Volt::route('/user-admin/{id}',     'admin/admin-form')->name('user.admin.form');
    Volt::route('/user-member',         'member/member-table')->name('user.member');
    Volt::route('/user-member/{id}',    'member/member-form')->name('user.member.form');

});
