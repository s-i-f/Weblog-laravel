<x-app>
    <x-slot name="slot">
        <div class="flex flex-row-reverse mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="px-1 sm:px-2">
                <form action="#" method="get">
                    <x-text-input type="text" name="search" id="search" placeholder="Search"></x-text-input>
                </form>
            </div>
            <div class="px-1 sm:px-2">
                <form action="#" method="get">
                    <select class="rounded-md shadow-sm border-slate-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="category_id" id="category" value="{{ old('category_id') }}">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div>
                @foreach ($posts as $post)
                <x-post.excerpt :post="$post"></x-post.excerpt>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app>