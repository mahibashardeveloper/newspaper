<!doctype html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Front Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla&display=swap" rel="stylesheet">
</head>
<body>

<div id="app">
    <app></app>
</div>

<script>
    window.core = {
        @if(\Illuminate\Support\Facades\Auth::guard('users')->check())
        UserInfo: {!! \Illuminate\Support\Facades\Auth::guard('users')->user() !!},
        @else
        UserInfo: null
        @endif
    }
</script>
</body>
@vite('resources/js/front/app.js')
</html>
