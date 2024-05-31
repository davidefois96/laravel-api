@extends('layouts.admin')

@section('content')

    <div class="p-5 w-25">
        <h2 class="text-center">Tecnologie</h2>


        <form action="{{route('admin.technologies.store')}}" method="post" class="d-flex my-3">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Nuova Tecnologia" aria-label="Search" name="name">
            <button class="btn btn-outline-success" type="submit">Invia</button>

        </form>

        @if ($errors->any())

            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error )

                     <li>{{$error}}</li>

                    @endforeach
                </ul>

            </div>

        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>

        @endif

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>

        @endif





        <table class="table margin ">
            <thead>
            <tr>


                <th scope="col">Nome</th>
                <th class="text-center " scope="col">Interagisci</th>
            </tr>
            </thead>
            <tbody >

                @foreach ($technologies as $technology )

                <tr>

                    <td>
                        <form action="{{route('admin.technologies.update',$technology)}}" method="post" id="formEdit{{$technology->id}}">
                            @csrf
                            @method('PUT')
                            <input class=" border-0" type="text" value="{{$technology->name}}" name="name">

                        </form>


                    </td>
                    <td class="text-center d-flex ">

                        <button class="btn btn-warning me-2" onclick="submitForm({{$technology->id}})"><i class="fa-solid fa-pencil"></i></button>

                        @include('admin.partials.deleteForm', [
                            'route'=>route('admin.technologies.destroy',$technology),
                            'message'=> 'sei sicuro di voler eliminare '. $technology->name . '?'

                        ])


                    </td>

                </tr>

                @endforeach


            </tbody>
        </table>




    </div>
    <script>

        function submitForm(id){

            const form = document.getElementById(`formEdit${id}`);
            form.submit();
        }



    </script>


@endsection



