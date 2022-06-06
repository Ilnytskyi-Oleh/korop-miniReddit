<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Community;
use App\Models\Post;
use App\Models\PostVote;
use App\Observers\PostVoteObserver;
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

        View::share('newestPosts', Post::with('community')->latest()->take(5)->get());
        View::share('newestCommunities', Community::withCount('posts')->latest()->take(5)->get());

        PostVote::observe(PostVoteObserver::class);
    }
}
