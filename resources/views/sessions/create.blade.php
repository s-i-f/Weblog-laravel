<x-app>
    <x-slot name="header">
    </x-slot>
    <x-slot name="slot">

        <h1 class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">Login!</h1>
        <form action="{{ route('sessions.store') }}" method="post" class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
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
    </x-slot>
</x-app>
    