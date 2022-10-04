<x-app>
    <x-slot name="header">
    </x-slot>
    <x-slot name="slot">

        <article class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6"> 
            <h1>{{ $post->name }}</h1>

            <p>Written by <a href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a> in <a href="{{ URL::route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></p> 
            <p>Published at {{$post->created_at}}</p>

            <div>{!! $post->body !!}</div>
        </article>
    </x-slot>
</x-app>