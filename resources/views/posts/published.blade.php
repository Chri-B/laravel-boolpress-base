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
                <h1 class="text-center">Published Posts</h1>
                <table class="table">
                    <thead>
                        <th>Titolo</th>
                        <th>Autore</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($publishedPosts as $post)
                            <tr>
                                <td>
                                    <a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a>
                                </td>
                                <td>
                                    Scritto da <span class="font-italic">{{$post->author}}</span>
                                </td>
                                <td>
                                    <a href="{{route('posts.edit', $post->id)}}">EDIT</a>
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
