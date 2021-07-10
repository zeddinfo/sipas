<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body class="antialiased">
    <button type="button" class="btn btn-outline-primary">Primary</button>
    <button type="button" class="btn btn-close-white"><a href="{{route('login')}}">Login</a></button>
</body>
<script src="{{ asset('js/app.js') }}"></script>

</html>
