<x-app>
    <x-slot name="slot">
        <div class="flex flex-row-reverse mx-auto py-4 px-4 sm:px-6 lg:px-8 lg:grid lg:grid-cols-12">
            <div class="col-span-7 col-start-2 row-start-1">
                <h2 class="mb-2 text-lg font-semibold italic">Sign up for the mailinglist:</h2>
                <form action="{{ route('mailinglist.success') }}" method="post">
                    @method('POST')
                    @csrf
                    <x-text-input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Fill in your email here" required></x-text-input>
                    <x-primary-button class="mt-2">Submit</x-primary-button>
                    <x-post.form.error name="email" />
                </form>
            </div>
        </div>

    </x-slot>
</x-app>