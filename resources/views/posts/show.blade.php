
<x-layout>
<!-- START CONTENT -->

    <h2 class="text-lg font-bold">{{ $post->title }}</h2>

    <p class="mt-10">
        {{ $post->description }}
    </p>

    <p class="mt-6 flex justify-start">
        <x-buttons.href href="/posts/{{ $post->id }}/edit">Edit</x-buttons.href>

    </p>

</x-layout>

