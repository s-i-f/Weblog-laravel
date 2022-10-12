
        <article class="max-w-7xl px-8 m-6"> 
            <a class="font-bold" href="{{ route('posts.show', $post->slug) }}">
                <h2>{{ $post->name }}</h2>
            </a>
            <p>Written by <a class="font-bold" href="{{ route('users.show', $post->user->name) }}">{{ $post->user->name }}</a> 
                in <a class="font-bold" href="{{ route('categories.show', $post->category->slug) }}">{{ ucwords($post->category->name) }}</a></p>
            <p>Published at {{$post->created_at}}</p>
            <p>{{ $post->excerpt }}</p>
        </article>
