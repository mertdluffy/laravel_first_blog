@props(['posts','comments'])
<section class="mx-auto">
    <section class=" py-8 max-w-4xl mx-auto">
        <x-panel class="mx-20 mt-10">
            <div class="card" style="text-align:center">
                <h1>{{auth()->user()->name}}</h1>
                <p class="title">{{auth()->user()->username}}</p>
                <p>Comments : {{count($comments)}}</p>
                <p>Posts : {{count($posts)}}</p>
                <p>Using since {{auth()->user()->created_at->diffforhumans()}}</p>
            </div>

        </x-panel>
        <section class="mt-10" style="text-align: center;">
            <a class="bg-blue-500 uppercase font-semibold text-xs text-white rounded-xl py-2 px-10"
               href="/profile/posts">Posts</a>
            <a class="bg-blue-500 uppercase font-semibold text-xs text-white rounded-xl py-2 px-10"
               href="/profile/comments">Comments</a>
        </section>
    </section>
</section>
