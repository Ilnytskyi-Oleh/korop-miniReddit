<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Community $community)
    {
        return view('communities.show', compact('community'));
    }
}
