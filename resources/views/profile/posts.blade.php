<x-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <section class="mx-auto">
        <x-profile :comments="$comments" :posts="$posts"/>

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count())
                <x-posts-grid :posts="$posts"/>

                {{$posts->links()}}
            @else
                <p>No posts yet, please check back later</p>
            @endif
        </main>
    </section>
</x-layout>
