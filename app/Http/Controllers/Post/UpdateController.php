<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Community $community, Post $post)
    {

        $this->authorize('ownPost', $post);

        $post->update($request->validated());

        if($request->hasFile('post_image')){
            $image = $request->file('post_image')->getClientOriginalName();
            $request->file('post_image')->storeAs('posts/' . $post->id, $image);

            if($post->post_image !== '' && $post->post_image !== $image) {
                unlink(storage_path('app/public/posts/' . $post->id . '/' . $post->post_image));
            }

            $post->update(['post_image' => $image]);

            $img = Image::make(storage_path('app/public/posts/' . $post->id . '/'  . $image));
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(storage_path('app/public/posts/' . $post->id . '/' . 'prev_' . $image));
        }

        return redirect()->route('community.show', [$community, $post])->with('status', 'Post updated');
    }
}
