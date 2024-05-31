@extends('layouts.admin')



@section('content')

<h1 class="text-center my-5">Nuovo progetto</h1>

@if ($errors->any())

    <div class="alert alert-danger w-75 m-auto mb-5  ">

        <ul>
            @foreach ($errors->all() as $error )

                <li>{{$error}}</li>

            @endforeach


        </ul>


    </div>

@endif

<form action="{{route('admin.projects.store')}}" method="post" class="w-75 m-auto " enctype="multipart/form-data">
    @csrf

    <div class="mb-3">

        <label for="name" class=" form-label fs-4">Nome: *</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">

        @error('name')

            <small class="text-danger">

                {{$message}}

            </small>

        @enderror


    </div>
    <div class="mb-3">

        <label for="type" class=" form-label fs-4">Tipo: </label>
        <select id="type" name="type_id" class="form-select" aria-label="Default select example">
            <option>Seleziona un tipo</option>

            @foreach ($types as $type )

               <option value="{{$type->id}}" @if (old('type_id') == $type->id)  selected @endif>{{$type->name}}</option>

            @endforeach


          </select>


    </div>
    <div class="mb-3">

        <label class="form-label fs-4">Tecnologie </label>
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($technologies as $technology)

                <input value="{{$technology->id}}" type="checkbox" class="btn-check" name="technologies[]" id="technology_id{{$technology->id}}" autocomplete="off" @if(in_array($technology->id, old('technologies', []))) checked @endif>
                <label class="btn btn-outline-primary" for="technology_id{{$technology->id}}">{{$technology->name}}</label>

            @endforeach
        </div>

    </div>
    <div class="mb-3">

        <label for="image" class=" form-label fs-4">Immagine: </label>
        <input  type="file" class="form-control" id="image" name="image" onchange="showImage(event)">


    </div>

    <img class="thumb w-25 mb-5" id="thumb" src="/img/placeholder.png" >

    <div class="mb-5">

        <label for="description" class=" form-label fs-4">Descrizione: *</label>
        <textarea class="form-control w-100 @error('description') is-invalid @enderror" name="description" id="description" >{{old('description')}}</textarea>



        @error('description')

            <small class="text-danger">

                {{$message}}

            </small>

        @enderror

    </div>

    <button type="submit" class="btn btn-success border-1  border-secondary-subtle me-2 ">Invia</button>
    <button type="reset" class="btn btn-warning  border-1  border-secondary-subtle">Reset</button>




</form>
<script>
    function showImage(event){


        const thumb = document.getElementById('thumb');
        thumb.src = URL.createObjectURL(event.target.files[0]);
    }

</script>





@endsection

