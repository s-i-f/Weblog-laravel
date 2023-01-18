<x-app>
    <x-slot name="slot">
        <div class="flex flex-row-reverse mx-auto py-4 px-4 sm:px-6 lg:px-8 lg:grid lg:grid-cols-12">
            <div class="col-span-7 col-start-2 row-start-1">
                <h2 class="mb-2 text-lg font-semibold italic">Sign up for the mailinglist:</h2>
                <form action="{{ route('mailinglist.success', Auth::user()->username) }}" method="post">
                    @method('POST')
                    @csrf

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
                    <x-primary-button class="mt-2">Submit</x-primary-button>
                </form>
            </div>
        </div>

    </x-slot>
</x-app>