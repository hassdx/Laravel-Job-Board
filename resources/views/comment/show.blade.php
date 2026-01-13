<x-layout :title="$pageTitle">
    <h2>Comment by{{ $comment->author}}</h2>
    <p>{{ $comment->content }}</p>

    @if ($comment->post)
    <h3>related Post</h3>
    <ul>
        <li>


            <strong>{{ $comment->post->title }} </strong>
            <p>{{ $comment->post->body }}</p>
            <p>Author: {{ $comment->autour }}</p>
            <a href="{{ route('blog.show', $comment->post->id) }}">veiw full post</a>
        </li>
    </ul>
    @else
        <p>NO related post found for this comment</p>
    @endif
    <ul>
        @foreach ($comment->comments as $comment )

        <li>{{ $comment->content }}, {{ $comment->author }}</li>

        @endforeach
    </ul>
</x-layout>