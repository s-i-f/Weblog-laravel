<x-app>
    <x-slot name="slot" >
        <section class="p-8" >
            <form action="{{ route('posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-input-label for="name">Title:</x-input-label><br>
                    <x-text-input type="text" name="name" id="name" value="{{ $post->name }}"></x-text-input>
                
                    <x-post.form.error name="name"/>

                <br>
                <x-input-label for="category_id">Category:</x-input-label><br>
                    <select class="rounded-md shadow-sm border-slate-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="category_id" id="category" value="{{ old('category_id') }}" >
                        @foreach ($categories as $category)
                            @if ($category->id === $post->category_id) 
                                <option selected value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                            @else 
                                <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                            @endif
                        @endforeach
                    </select>
                
                    <x-post.form.error name="category"/>
                
                <br>
                <x-input-label for="excerpt">Excerpt:</x-input-label><br>
                    <x-text-input type="text" id="excerpt" name="excerpt" value="{{ $post->excerpt }}" ></x-text-input>
                
                    <x-post.form.error name="excerpt"/>
                
                <br>
                <x-input-label for="body">Body:</x-input-label><br>
                    <x-textarea-input name="body">{{$post->body}}</x-textarea-input>
                
                    <x-post.form.error name="body"/>
                    
                <br>
                <x-input-label for="thumbnail">Thumbnail:</x-input-label><br>
                    <x-text-input type="file" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}"></x-text-input>

                    <x-post.form.error name="thumbnail"/>


                <br><br>
                <x-input-label for="is_premium">Premium:</x-input-label><br>
                    @if ($post->is_premium)
                        <input type="radio" id="is_premium" name="is_premium" checked value="1">
                        <x-input-label for="is_premium">Yes</x-input-label>
                        <input type="radio" id="is_premium" name="is_premium" value="0">                
                        <x-input-label for="is_premium">No</x-input-label><br>
                    @else
                        <input type="radio" id="is_premium" name="is_premium" value="1">
                        <x-input-label for="is_premium">Yes</x-input-label>
                        <input type="radio" id="is_premium" name="is_premium" checked value="0">                
                        <x-input-label for="is_premium">No</x-input-label><br>
                    @endif
                    <x-post.form.error name="is_premium"/>

                <br>
                <x-primary-button>Submit</x-primary-button>
            </form>
        </section>
    </x-slot>
</x-app>
