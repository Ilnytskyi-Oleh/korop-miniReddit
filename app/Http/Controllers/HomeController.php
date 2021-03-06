<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('community')
                ->withCount(['votes' => function($query){
                    $query->where('post_votes.created_at', '>', now()->subDays(7))
                        ->where('vote', 1);
                }])->orderByDesc('votes_count')->take(5)->get();
        return view('home', compact('posts'));
    }
}
