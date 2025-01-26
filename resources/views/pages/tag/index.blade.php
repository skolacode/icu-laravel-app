@extends('layouts.main')

@section('title', 'Tag List')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1>Tag List</h1>

        <a 
            type="button"
            class="btn btn-primary mb-3"
            href="{{ route('tag.create') }}"
        >
            New Tag
        </a>

        @foreach ($tags as $tag)
            <div class="card mb-3" style="width: 50%;">
                <div class="card-body">
                    <p class="card-title">{{ $tag->name }}</p>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-start">
            {{ $tags->links() }}
        </div>
    </div>
@endsection
    