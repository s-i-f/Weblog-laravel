@extends ('layouts.app')

@section ('content')
    @foreach ( $posts as $post)
        <article> 
            <a href="{{ URL::route('posts.show', $post->slug) }}"><h1>{{ $post->name }}</h1></a>

            <p>Written by {{ $post->user->name }} in {{ $post->category->name }}</p>
            
            <div>{{ $post->excerpt }}</div>
        </article>
    @endforeach
@endsection
