<x-app>
    <x-slot name="slot">
        <section class="p-8">
            <form action="{{ route('users.store') }}" method="post" class="mx-auto">
                @method('POST')
                @csrf
                <x-input-label for="name">Name:</x-input-label><br>
                <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" required></x-text-input>
                <x-post.form.error name="name" />

                <br>
                <x-input-label for="username">Username:</x-input-label><br>
                <x-text-input type="text" name="username" id="username" value="{{ old('username') }}" required></x-text-input>
                <x-post.form.error name="username" />

                <br>
                <x-input-label for="email">Email:</x-input-label><br>
                <x-text-input type="text" id="email" name="email" value="{{ old('email') }}" required></x-text-input>
                <x-post.form.error name="email" />

                <br>
                <x-input-label for="password">Password:</x-input-label><br>
                <x-text-input type="password" id="password" name="password" required></x-text-input>
                <x-post.form.error name="password" />

                <br><br>
                <x-input-label for="premium">Do you want to get premium?</x-input-label><br>
                <input type="radio" id="premium" name="is_premium" value="1">
                <x-input-label for="premium">Yes</x-input-label>
                <input type="radio" id="premium" name="is_premium" value="0">
                <x-input-label for="premium">No</x-input-label><br>
                <x-post.form.error name="premium" />

                <br>
                <x-input-label for="mailinglist">Want to be on the mailinglist?</x-input-label><br>
                <input type="radio" id="mailinglist" name="mailinglist" value="1">
                <x-input-label for="mailinglist">Yes</x-input-label>
                <input type="radio" id="mailinglist" name="mailinglist" value="0">
                <x-input-label for="mailinglist">No</x-input-label><br>
                <x-post.form.error name="mailinglist" />

                <br>
                <x-primary-button>
                    Register</x-primary-button>
            </form>
        </section>
    </x-slot>
</x-app>