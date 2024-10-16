@extends('layouts.main')

@section('title', 'Feed List')

@section('content')

    <h1>Feed Listing</h1>

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Feed List</h1>
        <ul>
            @foreach ($feeds as $feed)
            <li>
                <a href="{{ route('feed.show', ['feed' => $feed->id]) }}">{{ $feed->title }}</a>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
    