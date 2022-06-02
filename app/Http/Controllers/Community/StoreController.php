<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Http\Requests\Community\StoreCommunityRequest;
use App\Models\Community;

class StoreController extends Controller
{
    public function __invoke(StoreCommunityRequest $request)
    {
        $community = Community::create($request->validated() + ['user_id'=> auth()->id()]);
        $community->topics()->attach($request->topics);

        return redirect()->route('community.show', $community);
    }
}
