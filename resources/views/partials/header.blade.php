<div class="container">
  <div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand navbar-light bg-light">
            <a class="navbar-brand" href="{{route('posts.index')}}">BoolPress</a>
            {{-- DROPDOWN MENU NON FUNZIONA --}}
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            {{-- <div class="collapse navbar-collapse" id="navbarToggleExternalContent"> --}}
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('posts.index')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('posts.published')}}">Published Posts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('posts.create')}}">Create New Post</a></li>
                </ul>
            {{-- </div> --}}
        </nav>
    </div>
  </div>
</div>
