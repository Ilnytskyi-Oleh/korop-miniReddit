<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Community;
use App\Models\Post;
use Intervention\Image\Facades\Image;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, Community $community)
    {
        $post = $community->posts()->create([
                    'user_id' => auth()->id(),
                    'title' => $request->title,
                    'post_text' => $request->post_text ?? null,
                    'post_url' => $request->post_url ?? null,
                ]);

        if($request->hasFile('post_image')){
            $image = $request->file('post_image')->getClientOriginalName();
            $request->file('post_image')->storeAs('posts/' . $post->id, $image);
            $post->update(['post_image' => $image]);

            $img = Image::make(storage_path('app/public/posts/' . $post->id . '/'  . $image));
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save(storage_path('app/public/posts/' . $post->id . '/' . 'prev_' . $image));
        }

        return redirect()->route('community.show', $community);
    }
}
