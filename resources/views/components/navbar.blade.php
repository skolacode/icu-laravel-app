<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('auth.signout') }}">Sign Out</a>
        </li> --}}
      </ul>

      {{-- Sign out button at the far right --}}
      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('auth.signout') }}">Sign Out</a>
          </li>
        @endauth
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('auth.signin') }}">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('auth.signup') }}">Sign Up</a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>