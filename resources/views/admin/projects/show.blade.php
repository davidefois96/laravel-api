@php
use App\Functions\Helper as Helper;
@endphp

@extends('layouts.admin')



@section('content')

<div class="d-flex align-items-center flex-column p-5 ">
    <h1 class="mb-4">{{$project->name}}</h1>

    @if ($project->type)
        <h2 >type: {{$project->type->name}}</h2>

    @endif
    @if (count($project->technologies) > 0)
        <p>Technologies:
            @foreach ($project->technologies as $technology)
                <span class="badge bg-primary">{{$technology->name}}</span>
            @endforeach
        </p>
    @endif


    <h2 class="my-5">Data : {{Helper::formatDate($project->update_at)}}</h2>

    <img class="w-50" src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}" onerror="this.src=`/img/placeholder.png`">
    <p class="my-5">{{$project->image_original_name}}</p>

    <h4 >{{$project->description}}</h4>



</div>








</form>





@endsection

