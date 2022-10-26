@props(['comment'])
<x-post.panel class="bg-slate-200">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/40?u={{ $comment->user_id }}" alt="" width="40" height="40" class="rounded-md">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->user->username }}</h3>
                <p class="text-xs italic">
                    Posted
                    <time title="{{$comment->created_at->format('d-m-Y H:i')}}">{{$comment->created_at->diffForHumans()}}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-post.panel>