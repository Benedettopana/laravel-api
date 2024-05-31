@php
    use App\Functions\Helper as Help;
@endphp

@extends('layouts.admin')

@section('content')

<section class="h-100 flex-grow-1 sec-index ">
    <div class="container-xl p-1 mt-3 pt-5 mt-5">

        <div class="row">
            <div class="col"><h1 class="mb-5">Dettagli</h1></div>
        </div>

        <div class="row">
            <div class="col">
                      <h5 class="card-title mb-2  text-capitalize"><span class="fw-bold me-2">Nome:</span> {{$project->title}}</h5>
                      <p class="card-text text-capitalize"><span class="fw-bold me-2">Link:</span> {{$project->href}}</p>

                      @if ($project->type)

                      <p class="card-text text-capitalize"><span class="fw-bold me-2">Tipo:</span> {{$project->type->id}} {{$project->type->name}}</p>
                      @endif

                      @if (count($project->technologies) > 0)

                      <p class="card-text text-capitalize"><span class="fw-bold me-2">Tecnologie:</span>
                        @foreach ($project->technologies as $technology)
                        <span class="badge rounded-pill text-bg-primary">{{$technology->name}}</span>
                        @endforeach
                     </p>
                      @endif

                      <p class="card-text text-capitalize"><span class="fw-bold me-2">Descrizione:</span> {{$project->description}}</p>

                    <div class="d-flex mb-3">

                        <a href="{{route('admin.project.index')}}" class="btn btn-success m-2">Torna ai projects</a>
                    </div>


            </div>
        </div>

    </div>
</section>
@endsection

@section('title')
    Project
@endsection
