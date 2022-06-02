<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Http\Requests\Community\UpdateCommunityRequest;
use App\Models\Community;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateCommunityRequest $request, Community $community)
    {
        if($community->user_id != auth()->id()){
            abort(403);
        }
        $community->update($request->validated());
        $community->topics()->sync($request->topics);

        return redirect()->route('community.index');
    }
}
