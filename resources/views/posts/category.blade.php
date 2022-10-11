<x-app>
    <x-slot name="slot">
        @guest
            @foreach ($posts as $post)
                @if (! $post->premium)
                    <article class="max-w-7xl px-8 m-6"> 
                        <a class="font-bold" href="{{ route('posts.show', $post->slug) }}"><h1>{{ $post->name }}</h1></a>

                        <p>Written by <a class="font-bold" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a>
                         in <a class="font-bold" href="{{ URL::route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></p>
                        <p>Published at {{$post->created_at}}</p>
                        
                        <div>{!! $post->excerpt !!}</div>
                    </article>
                @endif
            @endforeach
        @else
            @if (!auth()->user()->is_premium)
                @foreach ( $posts as $post)
                    @if (! $post->premium)
                        <article class="max-w-7xl px-8 m-6"> 
                            <a href="{{ route('posts.show', $post->slug) }}"><h1>{{ $post->name }}</h1></a>

                            <p>Written by <a class="font-bold" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a>
                             in <a class="font-bold" href="{{ URL::route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></p>
                            <p>Published at {{$post->created_at}}</p>
                            
                            <div>{!! $post->excerpt !!}</div>
                        </article>
                    @endif
                @endforeach
            @else 
                @foreach ($posts as $post)
                    <article class="max-w-7xl px-8 m-6"> 
                        <a class="font-bold" href="{{ URL::route('posts.show', $post->slug) }}"><h1>{{ $post->name }}</h1></a>
                        <p>Written by <a class="font-bold" href="{{ URL::route('users.show', $post->user->name) }}">{{ $post->user->name }}</a> 
                            in <a class="font-bold" href="{{ URL::route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></p>
                        <p>Published at {{$post->created_at}}</p>
                        <div>{!! $post->excerpt !!}</div>
                    </article>
                @endforeach
            @endif
        @endguest
    </x-slot>
</x-app>    