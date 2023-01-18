<x-app>
    <x-slot name="slot">
        <section class="p-8">
            <h2 class="mb-2 text-lg font-semibold italic">Edit your profile</h2>
            <form action="{{ route('users.update', Auth::user()->username) }}" method="post" class="mx-auto">
                @method('POST')
                @csrf
                <x-input-label for="name">Name:</x-input-label><br>
                <x-text-input type="text" name="name" id="name" value="{{$user->name}}" required></x-text-input>
                <x-post.form.error name="name" />

                <br>
                <x-input-label for="username">Username:</x-input-label><br>
                <x-text-input type="text" name="username" id="username" value="{{$user->username}}" required></x-text-input>
                <x-post.form.error name="username" />

                <br>
                <x-input-label for="email">Email:</x-input-label><br>
                <x-text-input type="text" name="email" id="email" value="{{$user->email}}" required></x-text-input>
                <x-post.form.error name="email" />

                <br>
                <x-input-label for="is_premium">Premium account:</x-input-label><br>
                    @if ($user->is_premium)
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
                <x-post.form.error name="is_premium" />

                <br>
                <x-input-label for="mailinglist">Want to be on the mailinglist:</x-input-label><br>
                    @if ($user->mailinglist)
                        <input type="radio" id="mailinglist" name="mailinglist" checked value="1">
                        <x-input-label for="mailinglist">Yes</x-input-label>
                        <input type="radio" id="mailinglist" name="mailinglist" value="0">
                        <x-input-label for="mailinglist">No</x-input-label><br>
                    @else
                        <input type="radio" id="mailinglist" name="mailinglist" value="1">
                        <x-input-label for="mailinglist">Yes</x-input-label>
                        <input type="radio" id="mailinglist" name="mailinglist" checked value="0">
                        <x-input-label for="mailinglist">No</x-input-label><br>
                    @endif
                <x-post.form.error name="mailinglist" />
                

                <br>
                <button type="button"><a href="{{ route('users.index') }}">Cancel</a></button>
                <x-primary-button>Save changes</x-primary-button>
            </form>
        </section>
        
        <section class="p-8">
        <h2 class="mb-2 text-lg font-semibold italic">Or delete your profile</h2>
            <form action="{{  route('users.destroy', Auth::user()->username) }}">
                @csrf
                <x-primary-button>Delete profile</x-primary-button>
            </form>
        </section>

    </x-slot>
</x-app>