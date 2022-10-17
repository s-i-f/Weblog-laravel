<x-app>
    <x-slot name="slot" >
        <section class="p-8" >
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <x-input-label for="name">Title:</x-input-label><br>
                    <x-text-input type="text" name="name" id="name" value="{{ old('name') }}"></x-text-input>
                
                    <x-post.form.error name="name"/>

                <br>
                <x-input-label for="category_id">Category:</x-input-label><br>
                    <select class="rounded-md shadow-sm border-slate-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="category_id" id="category" value="{{ old('category_id') }}" >
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                
                    <x-post.form.error name="category"/>
                
                <br>
                <x-input-label for="excerpt">Excerpt:</x-input-label><br>
                    <x-text-input type="text" id="excerpt" name="excerpt" value="{{ old('excerpt') }}"></x-text-input>
                
                    <x-post.form.error name="excerpt"/>
                
                <br>
                <x-input-label for="body">Body:</x-input-label><br>
                    <x-textarea-input name="body"></x-textarea-input>
                
                    <x-post.form.error name="body"/>

                <br>
                <x-input-label for="premium">Premium:</x-input-label><br>
                    <input type="radio" id="premium" name="is_premium" value="1">
                    <x-input-label for="premium">Yes</x-input-label>
                    <input type="radio" id="premium" name="is_premium" value="0">                
                    <x-input-label for="premium">No</x-input-label><br>

                    <x-post.form.error name="premium"/>

                <br>
                <br>
                <x-primary-button>Submit</x-primary-button>
            </form>
        </section>
    </x-slot>
</x-app>
