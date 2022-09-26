@extends ('layouts.app')

@section ('content')

@foreach ( $posts as $post)
    <article> 
        <a href="{{ URL::route('posts.show', $post->slug) }}"><h1>{{ $post->name }}</h1></a>

        <p>Written by <a href="{{ URL::route('users.show', $post->user->name) }}">{{ $post->user->name }}</a> in <a href="{{ URL::route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a></p>
        <p>Published at {{$post->created_at}}</p>
        
        <div>{!! $post->excerpt !!}</div>
    </article>
@endforeach

    
@endsection