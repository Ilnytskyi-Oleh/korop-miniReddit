<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $communities = Community::all();

        return view('communities.index', compact('communities'));
    }
}
