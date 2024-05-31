@extends('layouts.admin')
@section('content')
<div class="container-xl ">
    <h1 class="my-5">Crea un vuono tipo</h1>
    {{-- messaggio di cancellazione avvenuta del progetto --}}
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
    {{session('error')}}
    </div>
    @endif
    <form action="{{ route('admin.type.store') }}" method="POST">
    @csrf

    <div class="row row-cols-2">
      <div class="col mt-2 ">
        <label for="name">Nome</label>
        <input
          type="text"
          class="
          form-control @error('name') is-invalid @enderror"
          id="name"
          name="name"
          value="name"
        >
        @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
        @enderror
      </div>

        {{-- <textarea type="textarea" class="form-control" id="desc" name="desc"></textarea> --}}
      </div>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-outline-success me-3">Crea</button>
        <button type="reset" class="btn btn-outline-danger">Cancella</button>
    </div>
  </form>
</div>
@endsection
