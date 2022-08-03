<x-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <x-profile :comments="$comments" :posts="$posts"/>

        <section class="col-span-8 col-start-5 mt-10 space-y-6">
            <section>

            </section>

            @foreach(auth()->user()->comments as $comment)
                <x-profile-comment :comment="$comment"/>
            @endforeach
        </section>
    </section>
</x-layout>
