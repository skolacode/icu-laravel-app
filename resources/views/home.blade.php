{{-- @extends('layouts.main')

@section('title', 'Home')

@section('content')
  <h1>Home</h1>
  <p>Welcome to the home page.</p>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }}</title>
</head>
<body>

  <h1>Hello,  {{ $name ?? "team" }}</h1>
  
</body>
</html>