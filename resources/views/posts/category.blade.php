@extends ('layouts.app')

@section ('content')

@foreach ( $posts as $post)
    <article> 
        <a href="{{ URL::route('posts.show', $post->slug) }}"><h1>{{ $post->name }}</h1></a>

        <p>Written by {{ $post->user->name }} in <a href="{{ URL::route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></p>
        
        <div>{{ $post->excerpt }}</div>
    </article>
@endforeach

    
@endsection