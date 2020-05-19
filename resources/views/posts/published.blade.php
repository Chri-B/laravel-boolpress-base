<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts-Published</title>
</head>
<body>
    <h1>Only Published Posts</h1>
    @foreach ($publishedPosts as $publishedPost)
        <h2>{{$publishedPost->title}}</h2>
        <h4>{{$publishedPost->author}}</h4>
        <small>{{$publishedPost->created_at}}</small>
    @endforeach
</body>
</html>
