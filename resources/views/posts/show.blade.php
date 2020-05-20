<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{$post->title}}</h2>
                <small>Scritto da <span class="font-italic">{{$post->author}}</span></small>
                <div>
                    {{$post->body}}
                </div>
                <div class="text-center">
                    <img src="{{$post->img}}" alt="{{$post->title}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('posts.index')}}" class="btn btn-dark btn-lg btn-block active" role="button" aria-pressed="true">HOME</a>
                <a href="{{route('posts.create')}}" class="btn btn-dark btn-lg btn-block active" role="button" aria-pressed="true">CREATE NEW POST</a>
            </div>
        </div>
    </div>
</body>
</html>
