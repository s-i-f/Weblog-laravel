<x-app>
    <x-slot name="slot">
        <section class="p-8" >
            <form action="{{ route('users.update', Auth::user()->username) }}" method="post" class="mx-auto">
                @method('POST')  
                @csrf
                <x-input-label for="name">Name:</x-input-label><br>
                <x-text-input type="text" name="name" id="name" value="{{$user->name}}" required></x-text-input>
                <x-post.form.error name="name"/>

                <br>
                <x-input-label for="username">Username:</x-input-label><br>
                <x-text-input type="text" name="username" id="username" value="{{$user->username}}" required></x-text-input>
                <x-post.form.error name="username"/>

                <br>
                <x-input-label for="email">Email:</x-input-label><br>
                <x-text-input type="text" name="email" id="email" value="{{$user->email}}" required></x-text-input>
                <x-post.form.error name="email"/>

                <br>
                <br>
                <x-primary-button>Save changes</x-primary-button>
            </form>
        </section>

    </x-slot>
</x-app>