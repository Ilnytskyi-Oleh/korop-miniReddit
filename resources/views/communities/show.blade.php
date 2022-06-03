@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $community->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <a class="btn btn-primary" href="{{ route('post.create', $community) }}">Create Post</a>
                        </div>
                        <div class="mt-5">
                            @forelse($posts as $post)
                                <a href="{{route('post.show', [$community, $post])}}">{{ $post->title }}</a>
                                <p>{{ Str::words($post->post_text,10) ?? 'No post text' }}</p>
                            @empty
                                No posts found
                            @endforelse
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
