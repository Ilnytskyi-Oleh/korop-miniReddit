<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use App\Models\PostVote;
use App\Models\Topic;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __invoke(Post $post, $vote)
    {

        if (!PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->count()

        && in_array($vote, [-1, 1]) && $post->user_id != auth()->id()) {

            PostVote::create([
                'post_id' => $post->id,
                'user_id' => auth()->id(),
                'vote' => $vote
            ]);

            $post->increment('votes', $vote);
        }

        return redirect()->route('community.show', $post->community);
    }
}
