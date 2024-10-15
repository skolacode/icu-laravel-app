@extends('layouts.main')

@section('title', 'Home')

@section('content')
  @php($_name = $name ?? "team")
    
  @if($_name == "abu")
    <p>You are banned</p>
  @else
    <h1>Hello,  {{ $_name }}</h1>
  @endif

  <button type="button" class="btn btn-primary">Click me</button>
@endsection
