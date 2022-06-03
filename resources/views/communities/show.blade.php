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


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
