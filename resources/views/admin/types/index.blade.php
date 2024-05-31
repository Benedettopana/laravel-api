@extends('layouts.admin')

@section('content')
<div class="container-xl">

<div class="container-xl p-1 mt-3 pt-5 mt-5">
    {{-- ? Messaggio di avvenuta cancellazione --}}
    @if(session('deleted'))
                <div class="alert alert-success" role="alert">
                {{ session('deleted')}}
                </div>
    @endif

    {{-- ?messaggio di aggiunta del progetto --}}
    @if(session('success'))
    <div class="alert alert-success my-3" role="alert">
       {{session('success')}}
    </div>
    @endif
    <div class="">
        <a href="{{ route('admin.type.create') }}" class="btn btn-success my-5"><i class="fa-solid fa-folder-plus"></i></a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nome</th>
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($types as $type )
          <tr>
              <th scope="row">{{$type->id}}</th>
              <td>{{$type->name}}</td>

              <td class="d-flex">
                <a
                  href="{{ route('admin.type.edit', $type)}}"
                  class="btn btn-outline-warning mb-1 me-2"
                  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                ><i class="fa-solid fa-pen"></i></a>

                <form action="{{route('admin.type.destroy', $type)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                      type="submit"
                      class="btn btn-outline-danger"
                      style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                    >
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
              </td>

          </tr>
          @endforeach
      </tbody>
  </table>
  <div class="paginator">
        {{-- {{$technologies->links()}} --}}
    </div>
</div>
</div>
@endsection
