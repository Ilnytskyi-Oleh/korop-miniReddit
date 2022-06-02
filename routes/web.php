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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['namespace' => 'Community','prefix' => 'communities' ],static function(){
        Route::get('/', IndexController::class)->name('community.index');
        Route::get('/create', CreateController::class)->name('community.create');
        Route::post('/', StoreController::class)->name('community.store');
        Route::get('/{community}', ShowController::class)->name('community.show');
    });
});


