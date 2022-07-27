<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.text-area name="excerpt"/>
            <x-form.text-area name="body"/>
            <div class="mb-6">
                <x-form.label name="Category" />
                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                        >{{$category->name}}</option>
                    @endforeach


                </select>
                <x-form.error name="category_id" />
            </div>


            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>

</x-layout>
