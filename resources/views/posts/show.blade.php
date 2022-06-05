@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $community->name }} : {{$post->title}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(!empty($post->post_url))
                            <div class="mb-2">
                                <a href="{{$post->post_url}}" target="_blank">{{$post->post_url}}</a>
                            </div>
                        @endif
                        @if($post->post_image)
                            <div class="my-4">
                                <img src="{{asset('storage/posts/' . $post->id . '/prev_' . $post->post_image)}}" alt="">
                            </div>

                        @endif
                        {{$post->post_text}}

                        @auth
                            @if($post->user_id == auth()->id())
                                <hr/>
                                <div class="mt-4">
                                    <a class="btn btn-secondary" href="{{ route('post.edit', [$community, $post]) }}">Edit</a>
                                    <a href="#"
                                       onclick="confirm('Точно?!');event.preventDefault();
                                                document.getElementById('delete-form').submit()"
                                       class="btn btn-danger">Delete</a>
                                    <form action="{{ route('post.delete', [$community, $post]) }}" method="POST"
                                          id="delete-form">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>

                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
