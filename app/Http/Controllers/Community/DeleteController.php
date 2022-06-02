<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Community $community)
    {
        if($community->user_id != auth()->id()){
            abort(403);
        }

        $community->delete();
        return redirect()->route('community.index')->with('status', 'Deleted!');
    }
}
