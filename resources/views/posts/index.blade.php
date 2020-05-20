<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    {{-- @dd($posts); --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">All Posts</h1>
                <table class="table">
                    <thead>
                        <th>Titolo</th>
                        <th>Autore</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
                                </td>
                                <td>
                                    Scritto da {{$post->author}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('posts.create')}}" class="btn btn-dark btn-lg btn-block active" role="button" aria-pressed="true">CREATE NEW POST</a>
            </div>
        </div>
    </div>
</body>
</html>
