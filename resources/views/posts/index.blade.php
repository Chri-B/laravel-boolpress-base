@extends('layouts.layout')

@section('title')
    HOME
@endsection

@section('header')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>All Posts</h1>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <body>
        {{-- @dd($posts); --}}
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                        {{ $posts->links() }}
                    </div>
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Autore</th>
                            <th colspan="2" class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
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
                    <div class="pagination">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('footer')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-12 col-lg-4">
                <a href="{{route('posts.create')}}" class="btn btn-success btn-lg btn-block active" role="button" aria-pressed="true">CREATE NEW POST</a>
                <a href="{{route('posts.published')}}" class="btn btn-light btn-lg btn-block active" role="button" aria-pressed="true">PUBLISHED POSTS</a>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
