@extends('layouts.app')

@section ('content')

    <form action="{{ route('users.store') }}" method="post">
        @method('POST')  
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <br>
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" value="{{ old('username') }}" required>
        @error('username')
            <p>{{ $message }}</p>
        @enderror
        <br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <p>{{ $message }}</p>
        @enderror 
        <br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <br><br>
        <label for="premium">Do you want to get premium:</label><br>
        <input type="radio" id="premium" name="is_premium" value="1">
        <label for="premium">Yes</label><br>
        <input type="radio" id="premium" name="is_premium" value="0">
        <label for="premium">No</label><br>
        @error('is_premium')
            <p>{{ $message }}</p>
        @enderror
        <br><button type="submit">Submit</button>
    </form>

    
@endsection