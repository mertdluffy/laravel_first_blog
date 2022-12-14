@props(['comment'])
<x-panel class="bg-gray-100">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{$comment->id}}" width="60" height="60" alt="">
        </div>
        <div class="ml-5">
            <header>
                <h3 class="font-bold">Commented on <a href="/posts/{{$comment->post->slug}}">{{ $comment->post->title }}</a></h3>
                <p class="text-xs">
                    Posted <time>{{$comment->created_at->diffForHumans()}}</time>
                </p>
            </header>

            <p>
                {{$comment->body}}
            </p>
        </div>
    </article>

</x-panel>

