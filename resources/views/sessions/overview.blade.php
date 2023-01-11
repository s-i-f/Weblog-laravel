<x-app>
    <x-slot name="slot">
        <h1 class="px-8 mt-6 text-slate-900">
            Welcome, {{Auth::user()->name}}!

        </h1>

        <a class="px-8 text-slate-900 text-xs italic hover:text-indigo-700 hover:underline" href="{{ route('users.edit', Auth::user()->username)}}">
            Edit
        </a>

        <h1 class="px-8 mt-6 text-slate-900">
            Posts by me
            <a class="px-8 text-slate-900 text-xs italic hover:text-indigo-700 hover:underline" href="{{ route('posts.create', Auth::user()->username)}}">
                add new post
            </a>
        </h1>

        <div class="px-8 my-3">
            <table>
                @foreach ($posts as $post)
                <tr>
                    <td class="px-8 mt-6 text-slate-900 hover:underline">
                        <a class="font-bold" href="{{ route('posts.show', $post->slug) }}">
                            <h2>{{ $post->name }}</h2>
                        </a>
                    </td>
                    <td class="pr-2 mt-6 text-slate-900">
                        @if ($post->is_premium)
                        <p class="inline px-2 py-1 bg-amber-500/70 border border-transparent rounded-md text-xs text-white uppercase tracking-widest">
                            Premium
                        </p>
                        @endif
                    </td>
                    <td class="px-1 mt-6 text-slate-900">
                        <form action="{{ route('posts.edit', $post->slug) }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-2 py-1 bg-slate-500 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-slate-700 active:bg-slate-900 focus:outline-none focus:border-indigo-300 focus:ring ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </form>
                    </td>
                    <td class="px-2 mt-6 text-slate-900">
                        <form action="{{ route('posts.destroy', $post->slug) }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-2 py-1 bg-slate-500 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-slate-700 active:bg-slate-900 focus:outline-none focus:border-indigo-300 focus:ring ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>


                @endforeach
            </table>

            @if (session('success'))
            <div class="alert alert-success bg-slate-500 fixed px-4 py-2 right-3 bottom-3 rounded-md text-white">
                {{ session('success') }}
            </div>
            @endif
        </div>

    </x-slot>
</x-app>