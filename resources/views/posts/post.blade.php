<x-app>
    <x-slot name="slot">
        @guest
            @if (!$post->premium)
                <x-post.complete :post="$post"></x-post.complete>
            @endif
        @else  
            @if (!auth()->user()->is_premium)
                @if (!$post->premium)
                    <x-post.complete :post="$post"></x-post.complete>
                @endif
            @else
                <x-post.complete :post="$post"></x-post.complete>
            @endif
        @endguest
    </x-slot>
</x-app>