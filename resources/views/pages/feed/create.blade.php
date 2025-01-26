@extends('layouts.main')

@section('title', 'View Feed')

@section('content')
  <div class="container">

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif


    <!-- The form to update the feed -->
    <form action="{{ route('feed.store') }}" method="POST">
      @csrf

      <div class="mb-3">
          <label for="title">Feed Title</label>
          <input 
            type="text" 
            name="title"
            id="title"
            class="form-control"
            required
            minlength="3"
            maxlength="100"
          >
      </div>

      <div class="mb-3">
        <label for="title">Description</label>
        <textarea 
          class="form-control" 
          name="description" 
          id="description" 
          cols="30" 
          rows="10"
        ></textarea>
      </div>

      @forelse ($tags as $tag)
        <div class="form-check">
          <input 
            class="form-check-input" 
            type="checkbox" 
            value="{{ $tag->id }}" 
            name="tags[]"
            id="tag-{{ $tag->id }}"
          >
          <label 
            class="form-check-label" 
            for="tag-{{ $tag->id }}"
          >
            {{ $tag->name }}
          </label>
        </div>
      @empty
        <p>No tags available.</p>
      @endforelse

      <button type="submit" class="btn btn-primary">Save</button>
    </form>

  </div>
@endsection
