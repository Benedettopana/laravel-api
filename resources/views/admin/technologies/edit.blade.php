@extends('layouts.admin')
@section('content')
<div class="container-xl ">
    <h1 class="my-5">Modifica una Tecnologia</h1>
    {{-- messaggio di cancellazione avvenuta del progetto --}}
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
    {{session('error')}}
    </div>
    @endif
    <form action="{{ route('admin.technology.update', $technology) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row row-cols-2">
      <div class="col mt-2 ">
        <label for="name">Nome</label>
        <input
          type="text"
          class="
          form-control @error('name') is-invalid @enderror"
          id="name"
          name="name"
          value="{{ $technology->name }}"
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
    <div class="">
        <button type="submit" class="btn btn-outline-success me-3">modifica</button>
        <button type="reset" class="btn btn-outline-danger">Cancella</button>
    </div>
  </form>
</div>
@endsection
