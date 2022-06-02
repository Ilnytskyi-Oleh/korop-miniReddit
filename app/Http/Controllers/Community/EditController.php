<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Topic;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Community $community)
    {
        if($community->user_id != auth()->id()){
            abort(403);
        }

        $topics = Topic::all();
        $community->load('topics');
        return view('communities.edit', compact('community', 'topics'));
    }
}
