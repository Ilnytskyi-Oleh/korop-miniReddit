<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community;

class ShowController extends Controller
{
    public function __invoke(Community $community)
    {
        $query =  $community->posts();

        if(\request('sort','') == 'popular') {
            $query->orderByDesc('votes');
        } else {
            $query->latest('id');
        }

        $posts = $query->paginate(10);
        return view('communities.show', compact('community', 'posts'));
    }
}
