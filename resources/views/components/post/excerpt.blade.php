<article class="max-w-7xl px-8 mt-6 text-slate-900 ">
    <a class=" text-lg font-bold max-w-fit" href="{{ route('posts.show', $post->slug) }}">
        {{ $post->name }}
    </a>
    @if ($post->is_premium)
    <p class="inline-block px-2 py-1 bg-amber-500/70 border border-transparent rounded-md text-xs text-white uppercase tracking-widest">
        Premium
    </p>
    @endif
    <p>Written by <a class="font-bold" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a>
        in <a class="font-bold" href="{{ route('categories.show', $post->category->slug) }}">{{ ucwords($post->category->name) }}</a></p>
    <p class="text-xs italic">Published
        <time title="{{$post->created_at}}">{{$post->created_at->diffForHumans()}}</time>,
         {{ $post->comments->count() }} comments
    </p>
    <p>{{ $post->excerpt }}</p>
</article>