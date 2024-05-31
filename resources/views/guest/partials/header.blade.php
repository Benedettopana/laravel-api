<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid d-flex justify-content-between ">
      <a class="navbar-brand me-5 " href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between d-flex  " id="navbarText">
        {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">

          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
        </ul> --}}
    </div>
    <div class="d-flex  w-25">
        <div class="me-3">
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
        </div>
        <div class="">
            <a class="btn btn-secondary" href="{{ route('register') }}">Register</a>
        </div>
    </div>
    {{-- <span class="navbar-text">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </span> --}}
      {{-- <div class=""></div> --}}
    </div>
  </nav>
