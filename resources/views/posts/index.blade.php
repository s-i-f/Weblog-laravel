<x-app>
    <x-slot name="slot">
        <div class="absolute top-45 right-7 h-16 w-16>
            <form action="" method="get">
                <x-text-input >search</x-text-input>
            </form>
        </div>
        
        @foreach ($posts as $post)
                <x-post.excerpt :post="$post"></x-post.excerpt>
        @endforeach
    </x-slot>
</x-app>