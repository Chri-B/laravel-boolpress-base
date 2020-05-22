@extends('layouts.layout')

@section('title')
    Post
@endsection

@section('main')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>{{$post->title}}</h1>
                    <small>Scritto da <span class="font-italic">{{$post->author}}</span></small>
                    <div class="text-center">
                        <img src="{{$post->img}}" alt="{{$post->title}}">
                    </div>
                    <div>
                        {{-- {{$post->body}} --}}
                        {!!$post->body !!}
                    </div>
                </div>
            </div>
    </body>
@endsection

@section('footer')
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <a href="{{route('posts.create')}}" class="btn btn-success btn-lg btn-block active" role="button" aria-pressed="true">CREATE NEW POST</a>
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-lg btn-block active" role="button" aria-pressed="true">EDIT</a>
                <a href="{{route('posts.index')}}" class="btn btn-light btn-lg btn-block active" role="button" aria-pressed="true">HOME</a>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection
