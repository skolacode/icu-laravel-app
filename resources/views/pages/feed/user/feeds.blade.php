@extends('layouts.main')

@section('title', 'My Feeds')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1>My Feeds</h1>

        <a 
            type="button"
            class="btn btn-primary mb-3"
            href="{{ route('feed.create') }}"
        >
            New Feed
        </a>

        @foreach ($feeds as $feed)
            <div class="card mb-3" style="width: 50%;">
                <div class="card-body">
                    <ul class="list-group
                        list-group-horizontal
                        mb-3"
                    >
                        @foreach ($feed->tags as $tag)
                            <li class="list-group
                                list-group-horizontal
                                me-2"
                            >
                                <span class="badge bg-primary">{{ $tag->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <p class="card-title">{{ $feed->id }} | {{ $feed->title }}</p>
                    <p 
                        class="card-text" 
                        style="color: #646363"
                    >
                        {{ $feed->description }}
                    </p>
                    <a 
                        type="button"
                        class="btn btn-secondary"
                        href="{{ route('feed.show', $feed->id) }}"
                    >
                        View
                    </a>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-start">
            {{ $feeds->links() }}
        </div>
    </div>
@endsection
    