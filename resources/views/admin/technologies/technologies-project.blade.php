@extends('layouts.admin')

@section('content')
<section class="h-100 w-100">
    <div class="container-xl p-1 mt-3 pt-5 mt-5 ">

        <h1>Elenco Progetti per {{ $technology->name }}</h1>
        {{-- <div class="row">
            <div class="col">

            </div>
        </div> --}}

        <ul class="list-group">
            @foreach ($technology->projects as $project)
                <li class="list-group-item">
                    <a href="{{ route('admin.project.show', $project) }}">
                        {{ $project->id }} - {{ $project->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection
