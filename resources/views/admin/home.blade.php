@php
use App\Functions\Helper as Helper;
@endphp

@extends('layouts.admin')

@section('content')

<div class=" overflow-y-scroll  p-5 text-center">

    <h1 class="mb-4">Home della dashboard</h1>

    <h2 class="mb-5">Sono presenti {{$projects_number}} Progetti!</h2>



    <div>

        <h2 class="mb-4">Ultimo Progetto: {{Helper::formatDate($last_project->updated_at)}}</h2>

        <h3 class="mb-3">{{$last_project->name}}</h3>
        <h3>{{$last_project->description}}</h3>


    </div>


</div>





@endsection
