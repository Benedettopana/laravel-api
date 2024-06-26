@extends('layouts.admin')

@section('content')
<section class="h-100 w-100">
    <div class="container-xl p-1 mt-3 pt-5 mt-5 ">
        <div class="row">
            <div class="col">
                <table class="table  w-100 ">
                    <thead>
                      <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Progetti</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type )
                        <tr>
                            <th scope="row">
                                {{$type->name}}
                            </th>

                            <td>
                                <ul class="list-group">
                                    @foreach ($type->projects as $project )

                                    <li class="list-group-item">
                                        {{$project->id}} - {{$project->title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginator">
                      {{-- {{$types->links()}} --}}

                  </div>
            </div>
        </div>
    </div>
</section>
@endsection
