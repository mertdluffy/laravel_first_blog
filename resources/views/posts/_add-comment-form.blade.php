@auth
    <x-panel>

        <form method="POST" action="/posts/{{$post->slug}}/comments">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60" width="40" height="40" alt="" class="rounded-full">
                <h2 class="ml-3">Want to participate?</h2>
            </header>
            <div class="mt-6">
                            <textarea name="body" clos="30" rows="10" class="w-full text-sm text-muted focus:outline-none focus:ring"
                                      placeholder="Quick, think of something to say!"
                                      required
                            ></textarea>
                <x-form.error name="body" />

            </div>
            <div class="flex justify-end mt-10 pt-6 border-t border-gray-200 ">
                <x-form.button>
                    Post
                </x-form.button>
            </div>

        </form>
    </x-panel>
@else
    <p>
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in</a> to leave a comment
    </p>
@endauth
