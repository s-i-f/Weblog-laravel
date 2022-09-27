@extends ('layouts.app')

@section ('content')
    <h1>Login!</h1>
    <form action="{{ route('sessions.store') }}" method="post">
        @method('POST')  
        @csrf
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" value="{{ old('username') }}" required>
        @error('username')
            <p>{{ $message }}</p>
        @enderror
        <br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <br>
        <br><button type="submit">Log in</button>
    </form>
@endsection