<x-app>
    <x-slot name="slot" >
        <section class="p-8" >
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <x-input-label for="name">Title:</x-input-label><br>
                <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" required></x-text-input>
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
                <br>
                <x-input-label for="category_id">Category:</x-input-label><br>
                <select class="rounded-md shadow-sm border-slate-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="category_id" id="category" value="{{ old('category_id') }}" >
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                    @endforeach
                </select>
                @error('category')
                    <p>{{ $message }}</p>
                @enderror
                <br>
                <x-input-label for="excerpt">Excerpt:</x-input-label><br>
                <x-text-input type="text" id="excerpt" name="excerpt" value="{{ old('excerpt') }}" required></x-text-input>
                @error('excerpt')
                    <p>{{ $message }}</p>
                @enderror
                <br>
                <x-input-label for="body">Body:</x-input-label><br>
                <x-text-input type="text" id="body" name="body" value="{{ old('body') }}" required></x-text-input>
                @error('body')
                    <p>{{ $message }}</p>
                @enderror
                <br>
                <x-input-label for="premium">Premium:</x-input-label><br>
                <input type="radio" id="premium" name="is_premium" value="1">
                <label for="premium">Yes</label>
                <input type="radio" id="premium" name="is_premium" value="0">
                <label for="premium">No</label><br>
                @error('is_premium')
                    <p>{{ $message }}</p>
                @enderror
                <br>
                <br>
                <x-primary-button>Submit</x-primary-button>
            </form>
        </section>
    </x-slot>
</x-app>
