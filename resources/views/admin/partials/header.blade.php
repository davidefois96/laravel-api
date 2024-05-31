
    <nav class="navbar text-bg-dark py-4 px-4">
        <div class="container-fluid">

            <a href="{{route('home')}}" target="_blank" class=" text-decoration-none me-3 btn btn-outline-light">Vai al sito</a>


            <div class="d-flex">
                <form action="{{route('admin.projects.index')}}" class="d-flex me-5" method="GET"  role="search">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <form action="{{route('logout')}}" method="POST" class="d-flex">
                    @csrf
                    <p class="me-3 my-auto ">{{Auth::user()->name}}</p>
                    <button class="btn btn-danger text-white" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
                </form>


            </div>

        </div>
      </nav>




