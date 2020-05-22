<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts-Published</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    {{-- @dd($publishedPosts); --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Published Posts</h1>
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Titolo</th>
                        <th>Autore</th>
                        <th colspan="2" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($publishedPosts as $post)
                            <tr>
                                <td>
                                    <span>{{$post->id}}</span>
                                </td>
                                <td>
                                    <a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a>
                                </td>
                                <td>
                                    Scritto da <span class="font-italic">{{$post->author}}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info" role="button" aria-pressed="true">EDIT</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('posts.index')}}" class="btn btn-light btn-lg btn-block active" role="button" aria-pressed="true">HOME</a>
                <a href="{{route('posts.create')}}" class="btn btn-dark btn-lg btn-block active" role="button" aria-pressed="true">CREATE NEW POST</a>
            </div>
        </div>
    </div>
</body>
</html>
