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
                        <form method="POST" action="{{ route('post.store', $community) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}*</label>

                                <div class="col-md-6">
                                    <input id="title"  type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="post_text" class="col-md-4 col-form-label text-md-end">{{ __('Post Text') }}</label>

                                <div class="col-md-6">
                                    <textarea name="post_text" id="post_text" class="form-control @error('post_text') is-invalid @enderror"  cols="30" rows="5">{{ old('post_text') }}</textarea>
                                    @error('post_text')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="post_url" class="col-md-4 col-form-label text-md-end">{{ __('URL Link') }}</label>

                                <div class="col-md-6">
                                    <input id="post_url"  type="text" class="form-control @error('post_url') is-invalid @enderror" name="post_url" value="{{ old('post_url') }}"  >

                                    @error('post_url')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="post_url" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input id="post_image"  type="file" class="form-control @error('post_image') is-invalid @enderror" name="post_image"  >

                                    @error('post_image')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
