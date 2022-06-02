@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Communities') }}</div>

                    <div class="card-body">
                        <a href="{{ route('community.create') }}" class="btn btn-primary">Create a community</a>
                        <br>
                        <br>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($communities as $community)
                                    <tr>
                                        <td>
                                            <a href="{{ route('community.show', $community) }}">{{$community?->name ?? 'No name'}}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('community.edit', $community) }}" class="btn btn-secondary">Edit</a>
                                            <a href="#"
                                                onclick="confirm('Точно?!');event.preventDefault();
                                                document.getElementById('delete-form').submit()"
                                                class="btn btn-danger">Delete</a>
                                            <form action="{{ route('community.delete', $community) }}" method="POST" id="delete-form">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
