<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title') - Boolpress</title>
</head>
<body>
    <header>
        @yield('header')
        @include('partials.header')
    </header>
    <main>
        @include('partials.status')
        @yield('main')
    </main>
    <footer>
        @yield('footer')
    </footer>
</body>
</html>
