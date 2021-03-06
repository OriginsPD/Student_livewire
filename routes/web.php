<?php

use App\Http\Controllers\logoutController;
use App\Http\Livewire\Home\Index;
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

Route::get('/', Index::class);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dropdown', \App\Http\Livewire\Admin\Index::class)->name('admin.dashboard');

});

Route::post('logout', [logoutController::class, 'logout'])->name('logout');
