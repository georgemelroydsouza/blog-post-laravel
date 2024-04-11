
<x-layout>
<!-- START CONTENT -->

    <form method="POST" action="/posts">
        @csrf

        <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Add a New Post</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-4">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <select name="category_id" id="category_id" class="block w-full rounded-md border-0 px-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @foreach ($categories as $category)
                            <option
                                value="{{ $category['id'] }}"
                                {{ old('category_id') == $category['id'] ? 'selected' : '' }}
                            >
                                {{ $category['name'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <x-inputs.text
                            name="title"
                            id="title"
                            placeholder="Title of the blog"
                            value="{{ old('title') }}">
                        </x-inputs.text>
                    </div>
                    @error('title')
                    <p class="text-xs text-red-600 font-semibold mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-span-full">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                <x-inputs.textarea
                    id="description"
                    name="description"
                    placeholder="Write a few sentences about this blog post"
                    rows="3"
                    value="{{ old('description') }}">
                </x-inputs.textarea>
                </div>
                @error('description')
                <p class="text-xs text-red-600 font-semibold mt-2">{{ $message }}</p>
                @enderror
            </div>
            </div>
        </div>


        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>


</x-layout>

