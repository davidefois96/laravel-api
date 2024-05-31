@extends('layouts.admin')

@section('content')

<h1 class="text-center my-5 ">Progetti per tipo</h1>

<table class="table">
    <thead>
      <tr>

        <th scope="col">Type</th>
        <th scope="col">Projects</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($types as $type )
        <tr>

            <td>{{$type->name}}</td>
            <td>
                <ul class="list-group">
                    @foreach ($type->projects as $project )
                        <a href="{{route('admin.projects.show',$project)}}">

                            <li class="list-group-item">{{$project->id}} - {{$project->name}}</li>


                        </a>


                    @endforeach


                  </ul>
            </td>

        </tr>

        @endforeach


    </tbody>
  </table>

@endsection
