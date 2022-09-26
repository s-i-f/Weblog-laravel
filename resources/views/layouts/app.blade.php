<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weblog</title>    
    <link rel="stylesheet" href="/app.css">
    
</head>

<body>
    <br>
    <div>
        <form action="{{ route('posts.index') }}"> <!--class="home-button"-->
            @csrf
            <button type="submit">Home</button>
        </form>
    </div>
    <div>
        @auth
        <span>Welcome, {{ auth()->user()->name }}!</span>

        <form action="{{ route('session.destroy') }}" method="post">
            @csrf
            <button type="submit">Log out</button>
        </form>
        @else
        <form  action="{{ route('users.create') }}">
            @csrf
            <button type="submit">Register</button>
        </form>
        <form  action="{{ route('session.create') }}">
            @csrf
            <button type="submit">Login</button>
        </form>
        @endauth

    <br></div>
    
    
    @yield('content')
    @if (session()->has('success'))
        <div class="flash-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</body>
</html>