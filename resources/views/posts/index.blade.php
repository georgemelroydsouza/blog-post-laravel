
<x-layout>
<!-- START CONTENT -->
<div class="bg-white py-8 sm:py-15">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <form action="/" method="GET">
            <div>
                <x-inputs.text placeholder="Enter the search string" name="search" value="{{ old('search', request('search')) }}"></x-inputs.text>
                <div class="mt-6">
                    <x-buttons.button >Search</x-button.button>
                </div>
            </div>
        </form>

        <div class="mx-auto mt-1 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-gray-200 pt-1 sm:mt-3 sm:pt-5 lg:max-w-none lg:grid-cols-3">

            @foreach ($posts as $post)

                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at->format('M, d-Y') }}</time>
                    <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category->name }}</a>
                    </div>
                    <div class="group relative">
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        <a href="/posts/{{ $post->id }}">
                        <span class="absolute inset-0"></span>
                        {{ $post->title }}
                        </a>
                    </h3>
                    <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->description }}</p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                    <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                    <div class="text-sm leading-6">
                        <p class="font-semibold text-gray-900">
                        <a href="/posts/{{ $post->id }}">
                            <span class="absolute inset-0"></span>
                            {{ $post->user->name }}
                        </a>
                        </p>
                        <p class="text-gray-600">Co-Founder / CTO</p>
                    </div>
                    </div>
                </article>

            @endforeach


        <!-- More posts... -->
      </div>
      <div class="mt-10">
        {{ $posts->withQueryString()->links() }}
      </div>

    </div>

    </div>

</x-layout>

