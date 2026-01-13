<x-layout :title="$pageTitle">
    <h2>Tag{{ $tag->title}}</h2>

    <h3>related PostS</h3>
    <ul>




        @forelse ($tag->posts as $post )
        <li>
            <strong>{{ $tag->post->title }} </strong>
            <p>{{ $post->body }}</p>
            <p>Author: {{ $post->autour }}</p>
            <a href="{{ route('blog.show', $post->id) }}">veiw full post</a>
        </li>

        @empty
        <p>NO related post found for this tag</p>

        @endforelse
    </ul>
</x-layout>