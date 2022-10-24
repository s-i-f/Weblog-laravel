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

    <section class="col-span-8 col-start-5 mt-10">
        <article class="flex bg-slate-200 border border-slate-300 rounded-md p-4 space-x-3">
            <div  class="flex-shrink-0">
                <img src="https://i.pravatar.cc/40" alt="" width="40" height="40" class="rounded-md">
            </div>

            <div>
                <header class="mb-4">
                    <h3 class="font-bold">John Doe</h3>
                    <p class="text-xs">
                        Posted
                        <time>1 day ago</time>
                    </p>
                </header>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac justo quis nulla facilisis gravida.
                </p>
            </div>
        </article>
    </section>
</article>