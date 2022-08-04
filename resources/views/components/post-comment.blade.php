@props(['comment'])
<x-panel class="bg-gray-100">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{$comment->id}}" width="60" height="60" alt="">
        </div>
        <div class="ml-5">
            <header>
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">
                    Posted <time>{{$comment->created_at->diffForHumans()}}</time>
                </p>
            </header>

            <p>
                {{$comment->body}}
            </p>
        </div>
    </article>
    @auth
        <div style="display: flex; align-items: flex-end; justify-content: left;">
            <h1>{{$comment->positive_votes}}</h1>
            <form method ="POST" action="/vote/{{$comment->id}}/{{auth()->user()->id}}/0">
                @csrf
                <button class="mx-4" ><img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Facebook_like_thumb.png" width="30" height="30" alt="" ></button>
            </form>
            <form method ="POST" action="/vote/{{$comment->id}}/{{auth()->user()->id}}/1">
                @csrf
                <button class="mx-4" ><img style ="transform: rotate(180deg);" src="https://upload.wikimedia.org/wikipedia/commons/1/13/Facebook_like_thumb.png" width="30" height="30" alt="" ></button>
            </form>
            <h1>{{$comment->negative_votes}}</h1>
        </div>
    @endauth
</x-panel>

