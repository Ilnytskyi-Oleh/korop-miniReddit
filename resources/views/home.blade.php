@extends('layouts.app')

@section('content')

    <div class="card">
                <div class="card-header">{{ __('Most popular posts') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
                                    <a href="{{route('post.show', [$post->community, $post])}}">{{ $post->title }}</a>
                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                    <p>{{ Str::words($post->post_text,10) ?? 'No post text' }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        No posts found
                    @endforelse
                </div>
            </div>

@endsection
