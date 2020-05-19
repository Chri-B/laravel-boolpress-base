<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    <h1>All Posts</h1>
    @foreach ($posts as $post)
        <h2>{{$post->title}}</h2>
        <h4>{{$post->author}}</h4>
        <small>{{$post->created_at}}</small>
    @endforeach
</body>
</html>
