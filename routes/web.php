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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function(){



    //Communities
    Route::group(['namespace' => 'Community','prefix' => 'communities' ],static function(){
        Route::get('/', IndexController::class)->name('community.index');
        Route::get('/create', CreateController::class)->name('community.create');
        Route::post('/', StoreController::class)->name('community.store');
        Route::get('/{community}', ShowController::class)->name('community.show');
        Route::get('/{community}/edit', EditController::class)->name('community.edit');
        Route::delete('/{community}', DeleteController::class)->name('community.delete');
        Route::patch('/{community}', UpdateController::class)->name('community.update');
    });

    //Posts
    Route::group(['namespace' => 'Post','prefix' => 'communities',],static function(){
        Route::get('/{community}/posts/', IndexController::class)->name('post.index');
        Route::get('/{community}/posts/create', CreateController::class)->name('post.create');
        Route::post('/{community}/posts/', StoreController::class)->name('post.store');
        Route::get('/{community}/posts/{post}', ShowController::class)->name('post.show');
        Route::get('/{community}/posts/{post}/edit', EditController::class)->name('post.edit');
        Route::delete('/{community}/posts/{post}', DeleteController::class)->name('post.delete');
        Route::patch('/{community}/posts/{post}', UpdateController::class)->name('post.update');
    });

    //Comments
    Route::group(['namespace' => 'Comment','prefix' => 'comments',],static function(){

        Route::post('/{post}/', StoreController::class)->name('comments.store');
    });

    //Votes
    Route::get('posts/{post}/vote/{vote}', \Post\VoteController::class)->name('post.vote');
});


