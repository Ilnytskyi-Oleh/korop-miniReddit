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
                        <div class="mb-5">
                            <a class="btn btn-primary" href="{{ route('post.create', $community) }}">Create Post</a>
                        </div>
                            @forelse($posts as $post)
                            <div class="row mb-3">
                                <div class="col-1 text-center">
                                    <div class=""><i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i></div>
                                    <h3>0</h3>
                                    <div><i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i></div>
                                </div>
                                <div class="col-11">
                                    <div class="">
                                            <a href="{{route('post.show', [$community, $post])}}">{{ $post->title }}</a>
                                            <p>{{ Str::words($post->post_text,10) ?? 'No post text' }}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                                No posts found
                            @endforelse
                            {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
