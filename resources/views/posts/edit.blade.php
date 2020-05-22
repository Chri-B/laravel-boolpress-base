@extends('layouts.layout')

@section('title')
    EDIT
@endsection

@section('header')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Post ID: <span class="red-italic">{{$post->id}}</span></h1>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form  action="{{route('posts.update', $post->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Post Title" value="{{ $post->title }}">
                            @error('title')
                            <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Post Author</label>
                            <input type="text" class="form-control" name="author" placeholder="Post Author" value="{{ $post->author }}">
                            @error('author')
                            <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="img">Post IMG</label>
                            <input type="text" class="form-control" name="img" placeholder="Post IMG" value="{{ $post->img }}">
                        </div>
                        <div class="form-group">
                            <label for="body">Textarea</label>
                            <textarea class="form-control" name="body" rows="3">{{ $post->body }}</textarea>
                            @error('body')
                            <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="text-center form-published">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="published" id="inlineRadio1" value="1" {{ (old('published') == 1) ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="published" id="inlineRadio2" value="0" {{ (old('published') == 0) ? 'checked' : '' }}>
                                <label class="form-check-label" for="unpublished">Unpublished</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" value="salva">Submit form</button>
                        </div>
                    </form>
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
                <a href="{{route('posts.published')}}" class="btn btn-dark btn-lg btn-block active" role="button" aria-pressed="true">PUBLISHED POSTS</a>
                <a href="{{route('posts.index')}}" class="btn btn-light btn-lg btn-block active" role="button" aria-pressed="true">HOME</a>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection
