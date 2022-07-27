<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title" >
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" :value="old('title', $post->title)" required />
            <x-form.input name="slug" :value="old('slug', $post->slug)" required />
            <x-form.text-area name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.text-area>
            <x-form.text-area name="body">{{ old('body', $post->body) }}</x-form.text-area>
            <div class="mb-6">
                <x-form.label name="Category" />
                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                                {{old('category_id',$post->category_id) == $category->id ? 'selected' : ''}}
                        >{{$category->name}}</option>
                    @endforeach


                </select>
                <x-form.error name="category_id" />
            </div>


            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>

</x-layout>
