<article class="max-w-7xl px-8 m-6"> 
    <h1 class="font-bold">{{ $post->name }}</h1>

    <p>Written by <a class="font-bold" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a>
        in <a class="font-bold" href="{{ route('categories.show', $post->category->slug) }}">{{ ucwords($post->category->name) }}</a></p> 
    <p>Published at {{$post->created_at}}</p>

    <p>{{ $post->body }}</p>
</article>