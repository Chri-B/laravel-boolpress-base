@extends('layouts.layout')

@section('title')
    Post
@endsection

@section('header')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Post ID: <span class="red-italic">{{$post->id}}</span></h1>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{$post->title}}</h2>
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
                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-lg btn-block" type="submit">DELETE</button>
                </form>
                <a href="{{route('posts.published')}}" class="btn btn-dark btn-lg btn-block active" role="button" aria-pressed="true">PUBLISHED POSTS</a>
                <a href="{{route('posts.index')}}" class="btn btn-light btn-lg btn-block active" role="button" aria-pressed="true">HOME</a>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection
