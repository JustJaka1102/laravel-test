<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>this is the site</h1>
    @guest
        <a href="{{route('login')}}">Login</a>
        <a href="{{route('register')}}">Register</a>
    @endguest
    @auth
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button class="text-danger">Logout</button>
    </form>
    <p>logged in</p>
    @endauth
</body>
</html>