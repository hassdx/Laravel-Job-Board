<x-layout :title="$pageTitle">
    <h2>Comments exploring</h2>
    @foreach ($comments as $comment)
        <h1 class="text-2xl"> {{ $comment->content }}</h1>
        <p class="text-1xl">{{ $comment->author }}</p>
        <p>{{ $comment->post }}</p>
        
    @endforeach

    
</x-layout>