<x-app>
    <x-slot name="slot">
        <h1 class="px-8 mt-6 text-slate-900">
            Welcome, {{Auth::user()->name}}!
            
        </h1 >

        <a class="px-8 text-slate-900 text-xs" href="{{ route('users.edit', Auth::user()->username)}}">
            Edit
        </a>

        <h1 class="px-8 mt-6 text-slate-900">
            Posts by me
        </h1>

        <div class="px-8 my-3">
            <table>
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-8 mt-6 text-slate-900">
                            <article> 
                                <a class="font-bold" href="{{ route('posts.show', $post->slug) }}">
                                    <h2>{{ $post->name }}</h2>
                                </a>
                            </article>
                        </td>
                        <td class="px-1 mt-6 text-slate-900">
                            <form action="{{ route('posts.edit', Auth::user()->username, $post->slug) }}">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-2 py-1 bg-slate-500 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-slate-700 active:bg-slate-900 focus:outline-none focus:border-indigo-300 focus:ring ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                                    Edit
                                </button>
                            </form>
                        </td>
                        <td class="px-2 mt-6 text-slate-900">
                            <form action="">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-2 py-1 bg-slate-500 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-slate-700 active:bg-slate-900 focus:outline-none focus:border-indigo-300 focus:ring ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    
                
                @endforeach
            </table>
            
        </div>

    </x-slot>
</x-app>