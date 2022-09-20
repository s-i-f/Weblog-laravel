@extends ('layouts.app')

@section ('content')
    @foreach ( $posts as $post)
        <article> 
            <h1>{{ $post->name }}</h1>

            <p>Written by {{ $post->user->name }}</p>
            
            <div>{{ $post->body }}</div>
        </article>
    @endforeach
@endsection
