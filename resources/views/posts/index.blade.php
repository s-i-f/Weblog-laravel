<x-app>
    <x-slot name="slot">
        @foreach ($posts as $post)
                <x-post.excerpt :post="$post"></x-post.excerpt>
        @endforeach
    </x-slot>
</x-app>