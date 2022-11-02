<article class="max-w-7xl px-8 mt-6 text-slate-900 lg:grid lg:grid-cols-12 gap-x-10">
    <div class="col-span-3 lg:text-center mb-10 p-2">
        @if ($post->thumbnail)
            <img src="/storage/{{ $post->thumbnail }}" alt="" width="300" height="250" class="rounded-md">
        @endif
    </div>
    <div class="col-span-9">
        <div>
            <h1 class=" text-lg font-bold max-w-fit ">{{ $post->name }}</h1>
            @if ($post->is_premium)
            <p class="inline px-2 py-1 bg-amber-500/70 border border-transparent rounded-md text-xs text-white uppercase tracking-widest">
                Premium
            </p>
            @endif
        </div>

        <div>
            <p>Written by <a class="font-bold hover:text-indigo-700 hover:underline" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a>
                in <a class="font-bold hover:text-indigo-700 hover:underline" href="{{ route('categories.show', $post->category->slug) }}">{{ ucwords($post->category->name) }}</a></p>
            <p class="text-xs italic">Published
                <time title="{{$post->created_at->format('d-m-Y H:i')}}">{{$post->created_at->diffForHumans()}}</time>
            </p>
            <p>{{ $post->body }}</p>
        </div>
    </div>

    <section class="col-span-9 col-start-4 mt-10 space-y-3">
        @auth
        <x-post.panel class="bg-slate-200/30">
            <form action="/posts/{{ $post->slug }}/comments" method="POST">
                @method('POST')
                @csrf

                <header class="flex items-start flex-shrink-0">
                    <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
                    <textarea name="body" class="w-full ml-4 text-sm rounded-md shadow-sm border-slate-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="" placeholder="Leave a comment.." rows="5" required></textarea>
                </header>

                <div class="mt-4">
                    <x-post.form.error name="body" />

                </div>

                <div class="flex justify-end">
                    <x-primary-button>Post</x-primary-button>
                </div>
            </form>
        </x-post.panel>
        @else
        <p><a class="hover:text-indigo-700 hover:underline" href="/login">Login</a>
            or <a class="hover:text-indigo-700 hover:underline" href="/register">register</a>
            to leave a comment.</p>
        @endauth

        @foreach ($post->comments->reverse() as $comment)
        <x-post.comment :comment="$comment" />
        @endforeach
    </section>
</article>