<x-app>
    <x-slot name="slot">
        <div class="flex flex-row-reverse mx-auto py-4 px-4 sm:px-6 lg:px-8 lg:grid lg:grid-cols-12">
            <!-- Posts -->
            <div class="col-span-7 col-start-2 row-start-1">
                @if ($posts->count())
                    @foreach ($posts as $post)
                    <x-post.excerpt :post="$post"></x-post.excerpt>
                    @endforeach
                @else
                    <p class="text-center">No posts yet. Check back later.</p>
                @endif
            </div>
        </div>
    </x-slot>
</x-app>