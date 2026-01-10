<!-- filepath: resources/views/tags/index.blade.php -->
<x-layout :title="$pageTitle">
    <h2>Tags</h2>
    @foreach ($tags as $tag)
        <h1 class="text-2xl">{{ $tag->title }}</h1>
    @endforeach

    {{ $tags->links()}}
</x-layout>