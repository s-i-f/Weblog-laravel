<x-app>
    <x-slot name="slot">
        <section class="p-8" >
            <form action="{{ route('sessions.store') }}" method="post" class="mx-auto">
                @method('POST')  
                @csrf
                <x-input-label for="username">Username:</x-input-label><br>
                <x-text-input type="text" name="username" id="username" value="{{ old('username') }}" required></x-text-input>
                <x-post.form.error name="username"/>

                <br>
                <x-input-label for="password">Password:</x-input-label><br>
                <x-text-input type="password" id="password" name="password" required></x-text-input>
                <x-post.form.error name="password"/>

                <br>
                <br>
                <x-primary-button>Log in</x-primary-button>
            </form>
        </section>
    </x-slot>
</x-app>
    