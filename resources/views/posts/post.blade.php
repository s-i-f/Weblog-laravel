<x-app>
    <x-slot name="slot">
        @guest
            @if (!$post->premium)
                <article class="max-w-7xl px-8 m-6"> 
                    <h1 class="font-bold">{{ $post->name }}</h1>

                    <p>Written by <a class="font-bold" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a>
                     in <a class="font-bold" href="{{ URL::route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></p> 
                    <p>Published at {{$post->created_at}}</p>

                    <div>{!! $post->body !!}</div>
                </article>
            @endif
        @else  
            @if (!auth()->user()->is_premium)
                @if (!$post->premium)
                    <article class="max-w-7xl px-8 m-6"> 
                        <h1 class="font-bold">{{ $post->name }}</h1>

                        <p>Written by <a class="font-bold" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a> 
                        in <a class="font-bold" href="{{ URL::route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></p> 
                        <p>Published at {{$post->created_at}}</p>

                        <div>{!! $post->body !!}</div>
                    </article>
                @endif
            @else
                <article class="max-w-7xl px-8 m-6"> 
                    <h1 class="font-bold">{{ $post->name }}</h1>

                    <p>Written by <a class="font-bold" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a>
                     in <a class="font-bold" href="{{ URL::route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></p> 
                    <p>Published at {{$post->created_at}}</p>

                    <div>{!! $post->body !!}</div>
                </article>
            @endif
        @endguest
    </x-slot>
</x-app>