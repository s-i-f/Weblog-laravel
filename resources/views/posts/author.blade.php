<x-app>
    <x-slot name="slot">
        @guest
            @foreach ($posts as $post)
                @if (! $post->premium)
                    <x-post.excerpt :post="$post"></x-post.excerpt>
                @endif
            @endforeach
        @else
            @if (!auth()->user()->is_premium)
                @foreach ( $posts as $post)
                    @if (! $post->premium)
                        <x-post.excerpt :post="$post"></x-post.excerpt>
                    @endif
                @endforeach
            @else 
                @foreach ($posts as $post)
                    <x-post.excerpt :post="$post"></x-post.excerpt>
                @endforeach
            @endif
        @endguest
        
    </x-slot>
</x-app>