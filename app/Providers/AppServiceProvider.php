<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Community;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        View::composer('layouts.app', function($view)
        {
            $view->with('newestPosts', Post::with('community')->latest()->take(5)->get());
            $view->with('newestCommunities', Community::withCount('posts')->latest()->take(5)->get());
        });
    }
}
