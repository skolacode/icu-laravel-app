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
    <form action="{{ route('feed.update', ['feed' => $feed->id]) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
          <label for="title">Feed Title</label>
          <input 
            type="text" 
            name="title"
            id="title"
            class="form-control"
            value="{{ old('title', $feed->title) }}"
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
        >{{ old('description', $feed->description) }}</textarea>
      </div>

      {{-- update tag and select preselected tags as a checkbox--}}
      <div class="mb-3">
        <label for="tags">Tags</label>
        <div class="form-check">
          @foreach ($tags as $tag)
            <input 
              class="form-check-input" 
              type="checkbox" 
              name="tags[]" 
              value="{{ $tag->id }}"
              @if (in_array($tag->id, old('tags', $feed->tags->pluck('id')->toArray())))
                checked
              @endif
            >
            <label class="form-check
            -label" for="tags">{{ $tag->name }}</label>
          @endforeach
        </div>
      </div>

      {{-- active and inactive radio  --}}
      <div class="mb-3">
        <label for="is_active">Status {{ $feed->is_active }}</label>
        <div class="form-check">
          <input 
            class="form-check-input" 
            type="radio" 
            name="is_active" 
            value=1
            @if (old('status', $feed->is_active) == true)
              checked
            @endif
          >
          <label class="form-check-label" for="is_active">Active</label>
        </div>
        <div class="form-check
        ">
          <input 
            class="form-check-input" 
            type="radio" 
            name="is_active"
            value=0
            @if (old('status', $feed->is_active) == false)
              checked
            @endif
          >
          <label class="form-check-label" for="is_active">Inactive</label>
        </div>
      </div>


      <button type="submit" class="btn btn-primary">Update Feed</button>
    </form>

  </div>
@endsection
