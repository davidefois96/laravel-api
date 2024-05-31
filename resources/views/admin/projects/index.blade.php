
@php
use App\Functions\Helper as Helper;
@endphp

@extends('layouts.admin')



@section('content')

    <div class="p-5 text-center">



        <h1>Progetti</h1>

        <div class="d-flex justify-content-center py-5">
            @if (isset($_GET['search']) && $_GET['search']!= '')

                <h4 class="me-4">Ricerca per: {{$_GET['search']}}</h4>

            @endif

            <h4>Elementi trovati: {{$numberProjects}}</h4>


        </div>



        @if (session('cancel'))

            <div class="alert alert-success mb-3 " role="alert">
            {{session('cancel')}}
            </div>

        @endif

        @if ($numberProjects != 0)
            <table class="table my-5">
                <thead>
                <tr>
                    <th scope="col"><a href="{{route('admin.orderBy',['direction'=>$direction, 'column'=>'id'])}}">Id</a> </th>
                    <th scope="col"><a href="{{route('admin.orderBy',['direction'=>$direction, 'column'=>'name'])}}">Name</a></th>
                    <th scope="col">Type</th>
                    <th scope="col">Technology</th>
                    <th scope="col">Date</th>
                    <th scope="col">Image</th>
                    <th scope="col">Interagisci</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project )

                        <tr>
                            <th scope="row">{{$project->id}}</th>
                            <td>{{$project->name}}</td>
                            <td>{{$project->type?->name}}</td>
                            <td>
                                @forelse ($project->technologies as $technology)

                                    <span class="badge bg-primary">{{$technology->name}}</span>
                                @empty
                                    <p>nessuna tecnologia</p>
                                @endforelse


                            </td>
                            <td>{{Helper::formatDate($project->update_at)}}</td>
                            <td><img class="" src="{{asset('storage/' . $project->image)}}" alt="{{$project->name}}" onerror="this.src=`/img/placeholder.png`"></td>
                            <td >
                                <a class="btn btn-success me-2" href="{{route('admin.projects.show',$project)}}"><i class="fa-solid fa-eye"></i></a>

                                <a class="btn btn-warning me-2" href="{{route('admin.projects.edit',$project)}}" ><i class="fa-solid fa-pencil"></i></a>


                                @include('admin.partials.deleteForm', [
                                    'route'=>route('admin.projects.destroy',$project),
                                    'message'=> 'sei sicuro di voler eliminare '. $project->name . '?'

                                ])





                            </td>
                        </tr>

                    @endforeach






                </tbody>
            </table>

        @endif



        {{$projects->links('pagination::bootstrap-5')}}


    </div>




@endsection

