@extends('layouts.admin')

@section('content')
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
        <a href="{{ route('admin.project.create') }}" class="btn btn-success my-5"><i class="fa-solid fa-folder-plus"></i></a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Tipo</th>
          <th scope="col">Tecnologie</th>
          <th scope="col">Link</th>

          <th scope="col">Descrizione</th>
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($projects as $project )
          <tr>
              <th scope="row">{{$project->title}}</th>
              <td><a href="{{ route('admin.project.show', $project)}}">{{$project->type->name}}</a></td>
              <td>
                @forelse ($project->technologies as $technology)
                <span class="badge rounded-pill text-bg-primary">
                    <a href="{{ route('admin.technology-projects', $technology) }}" style="text-decoration: none">
                        {{ $technology->name }}
                    </a>
                </span>

                @empty
                <span class="badge rounded-pill text-bg-warning">Nessuna</span>
                @endforelse
              </td>
              <td>{{$project->link}}</td>

              <td>{{$project->desc}}</td>
              <td class=" ">
                <a
                  href="{{ route('admin.project.edit', $project)}}"
                  class="btn btn-outline-warning mb-1"
                  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                ><i class="fa-solid fa-pen"></i></a>

                <form action="{{route('admin.project.destroy', $project)}}" method="POST">
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
          @empty
            <h4>Non ci sono progetti con quel nome</h4>
          @endforelse
      </tbody>
  </table>
  <div class="paginator">
        {{$projects->links()}}
    </div>
</div>

@endsection
