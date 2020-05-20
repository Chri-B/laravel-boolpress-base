<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
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
                            <h2>{{$post->title}}</h2>
                            <h4>{{$post->author}}</h4>
                            <small>{{$post->created_at}}</small>
                        @endforeach
                        {{-- @foreach ($articles as $article)
                        <tr>
                            <td><a href="{{route('articles.show', $article->slug)}}">{{$article->title}}</a></td>
                            <td>Scritto da {{$article->author}}</td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
