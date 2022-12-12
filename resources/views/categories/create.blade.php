<x-app>
    <x-slot name="slot" >
        <section class="p-8" >
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <x-input-label for="name">Category:</x-input-label><br>
                    <x-text-input type="text" name="name" id="name" value="{{ old('name') }}"></x-text-input>
                
                    <x-post.form.error name="category"/>
                    <x-primary-button>Submit</x-primary-button>
            </form>
        </section>
    </x-slot>
</x-app>
