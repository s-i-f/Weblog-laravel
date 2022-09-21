@extends ('layouts.app')

@section ('content')
    <article> 
        <h1>{{ $post->name }}</h1>

        <p>Written by {{ $post->user->name }} in <a href="{{ URL::route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></p> 
        
        <div>{{ $post->body }}</div>
    </article>

@endsection