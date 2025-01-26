@extends('layouts.main')

@section('title', 'Create Tag')

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
    <form action="{{ route('tag.store') }}" method="POST">
      @csrf

      <div class="mb-3">
          <label for="name">Tag Name</label>
          <input 
            type="text" 
            name="name"
            id="name"
            class="form-control"
            required
            minlength="3"
            maxlength="20"
          >
      </div>

      <button type="submit" class="btn btn-primary">Create</button>
    </form>

  </div>
@endsection
