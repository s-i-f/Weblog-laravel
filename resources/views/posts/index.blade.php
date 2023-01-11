<x-app>
    <x-slot name="slot">
        <div class="flex flex-row-reverse mx-auto py-4 px-4 sm:px-6 lg:px-8 lg:grid lg:grid-cols-12">
            <!-- Search -->
            <div class="px-1 sm:px-2 col-span-2 col-start-11 row-start-1">
                <form action="{{ route('posts.search') }}" method="get">
                    @csrf
                    <x-text-input class="w-40" type="text" name="search" id="search" placeholder="Search.."></x-text-input>
                    <x-primary-button class="mt-2">Submit</x-primary-button>
                </form>
            </div>
            <!-- Search by category -->
            <div class="px-1 sm:px-2  col-span-2 col-start-9 row-start-1">
                <form action="{{ route('categories.search') }}" method="post">
                    @method('POST')
                    @csrf
                    <select class="rounded-md shadow-sm border-slate-300 focus:border-indigo-300 focus:ring
                        focus:ring-indigo-200 focus:ring-opacity-50" name="category_slug" id="category" value="{{ old('category_slug') }}">
                        @foreach ($categories as $category)
                        <option value="{{$category->slug}}">{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                    <x-primary-button class="mt-2">Submit</x-primary-button>
                </form>
            </div>
            <!-- Posts -->
            <div class="col-span-7 col-start-2 row-start-1">
                @if ($posts->count())
                @foreach ($posts as $post)
                <x-post.excerpt :post="$post"></x-post.excerpt>
                @endforeach
                {{ $posts->links() }}
                @else
                <p class="text-center">No posts yet. Check back later.</p>
                @endif
            </div>
        </div>

        @if (session('success'))
        <div class="alert alert-success bg-slate-500 fixed px-4 py-2 right-3 bottom-3 rounded-md text-white">
            {{ session('success') }}
        </div>
        @endif
    </x-slot>
</x-app>