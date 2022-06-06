@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h1> {{ $community->name }}</h1>
                            </div>
                            <div class="col-4 text-right">
                                <a @if(request('sort', '') == '')style="font-size: 25px;" @endif
                                   href="{{ route('community.show', $community) }}">Newest posts</a>
                                <br/>
                                <a
                                    @if(request('sort', '') == 'popular')style="font-size: 25px;" @endif
                                    href="{{ route('community.show', $community) }}?sort=popular">Popular posts</a>
                            </div>
                        </div>

                    </div>

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
                            <div class="row mb-3 pb-2 border-bottom">
                                <div class="col-1 text-center">
                                    <div class="">
                                        <a href="{{ route('post.vote',[$post, 1]) }}">
                                            <i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <b>{{ $post->votes }}</b>
                                    <div>
                                        <a href="{{ route('post.vote',[$post, -1]) }}">
                                            <i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <div class="">
                                        <a href="{{route('post.show', [$community, $post])}}">{{ $post->title }}</a>
                                        <p>{{ $post->created_at->diffForHumans() }}</p>
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
