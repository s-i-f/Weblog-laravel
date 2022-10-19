<article class="max-w-7xl px-8 mt-6 text-slate-900"> 
    <h1 class="font-bold">{{ $post->name }}</h1>
    @if ($post->premium)
        <p class="text-xs text-indigo-700 ">Premium content</p>
    @endif
    <p>Written by <a class="font-bold" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a>
        in <a class="font-bold" href="{{ route('categories.show', $post->category->slug) }}">{{ ucwords($post->category->name) }}</a></p> 
    <p>Published at {{$post->created_at->format("d.m.Y H:i")}}</p>

    <p>{{ $post->body }}</p>
</article>