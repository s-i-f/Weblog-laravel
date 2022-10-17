<x-app>
    <x-slot name="slot">
        <section class="p-8" >
            <form action="{{ route('sessions.store') }}" method="post" class="mx-auto">
                @method('POST')  
                @csrf
                <x-input-label for="name">Name:</x-input-label><br>
                <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" required>{{$user->username}}</x-text-input>
                <x-post.form.error name="name"/>

                <br>
                <x-input-label for="username">Username:</x-input-label><br>
                <x-text-input type="text" name="username" id="username" value="{{ old('username') }}" required>{{Auth::user()->username}}</x-text-input>
                <x-post.form.error name="username"/>

                <br>
                <x-input-label for="email">Email:</x-input-label><br>
                <x-text-input type="text" name="email" id="email" value="{{ old('email') }}" required>{{Auth::user()->email}}</x-text-input>
                <x-post.form.error name="email"/>

                <br>
                <br>
                <x-primary-button>Save changes</x-primary-button>
            </form>
        </section>

    </x-slot>
</x-app>