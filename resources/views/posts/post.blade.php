@extends ('layouts.app')

@section ('content')
    <article> 
        <h1>{{ $post->name }}</h1>

        <p>Written by {{ $post->user->name }} in {{ $post->category->name }}</p> 
        
        <div>{{ $post->body }}</div>
    </article>

    <br><a href="/">Back</a>
@endsection