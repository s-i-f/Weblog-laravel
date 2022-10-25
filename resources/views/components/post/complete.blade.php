<article class="max-w-7xl px-8 mt-6 text-slate-900 lg:grid lg:grid-cols-12">
    <div class="col-span-4"></div>
    <div class="col-span-8">
        <h1 class=" text-lg font-bold max-w-fit ">{{ $post->name }}</h1>
        @if ($post->is_premium)
        <p class="inline px-2 py-1 bg-amber-500/70 border border-transparent rounded-md text-xs text-white uppercase tracking-widest">
            Premium
        </p>
        @endif
        <p>Written by <a class="font-bold" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a>
            in <a class="font-bold" href="{{ route('categories.show', $post->category->slug) }}">{{ ucwords($post->category->name) }}</a></p>
        <p class="text-xs italic">Published
            <time title="{{$post->created_at}}">{{$post->created_at->diffForHumans()}}</time>
        </p>
        <p>{{ $post->body }}</p>
    </div>

    <section class="col-span-8 col-start-5 mt-10 space-y-3">
        <x-post.panel class="bg-slate-200/30">
            <form action="#" method="post">
                @csrf

                <header class="flex items-center">
                    <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
                    <h2 class="ml-4">Leave a comment</h2>
                </header>

                <div class="mt-4">
                    <textarea name="body" class="w-full text-sm rounded-md shadow-sm border-slate-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="" placeholder="Type here..." cols="30" rows="5"></textarea>
                </div>

                <div class="flex justify-end">
                    <x-primary-button>Post</x-primary-button>
                </div>
            </form>
        </x-post.panel>

        @foreach ($post->comments as $comment)
            <x-post.comment :comment="$comment" />
        @endforeach
    </section>
</article>