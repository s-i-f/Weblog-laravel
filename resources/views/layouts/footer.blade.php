<!-- Page Footer -->
<footer class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
        </div>
</footer>

<div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 text-right h-12">
        @auth   
                <p class="p-3 text-sm">
                        Want to stay updated? <a class="hover:text-indigo-700 hover:underline" href="{{ route('mailinglist.signup', Auth::user()->username) }}">
                                Click here</a> to sign up for the mailing list!
                </p>
        @else
                <p class="p-3 text-sm">
                        
                </p>
        @endauth
</div>