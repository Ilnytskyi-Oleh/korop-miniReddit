<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $topics = Topic::all();
        return view('communities.create', compact('topics'));
    }
}
