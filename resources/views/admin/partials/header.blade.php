<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top hb">
    <div class="container-fluid d-flex justify-content-between ">
      <a class="navbar-brand me-5 " href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between d-flex  " id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}" target="_blank">Public Home</a>
          </li>
        </ul>
    </div>
    <div class="">
        <form action="{{route('admin.project.index')}}" method="GET" class="d-flex me-3" role="search">
            <input type="search" name="toSearch" class="form-control me-2" placeholder="Cerca" aria-label="search">
            <button type="submit" class="btn btn-secondary "><i class="text-primary  fa-solid fa-circle-chevron-right"></i></button>
        </form>
    </div>
    <div class="">
      <p class="fw-bolder mt-3 me-5 ">
          {{ Auth::user()->name }}
      </p>
    </div>
    <span class="navbar-text">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </span>
      {{-- <div class=""></div> --}}
    </div>
  </nav>
