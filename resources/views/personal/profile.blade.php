<x-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="card" style="text-align:center">
        <h1>{{auth()->user()->name}}</h1>
        <p class="title">{{auth()->user()->username}}</p>
        <p>Comments : {{count($comments)}}</p>
        <p>Posts : {{count($posts)}}</p>
        <p>Using since {{auth()->user()->created_at->diffforhumans()}}</p>
    </div>
</x-layout>
