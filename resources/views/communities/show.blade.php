@extends('layouts.app')

@section('content')

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
                                @livewire('post-votes', ['post' => $post])

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
@endsection
