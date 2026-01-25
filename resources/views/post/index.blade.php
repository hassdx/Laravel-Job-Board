<x-layout :title="$pageTitle">

  @if (session('success'))
  <div class="mb-4 rounded-md bg-green-50 p-4">
    <div class="flex">
      <div class="ml-3">
        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
      </div>
    </div>
  </div>

  @endif

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/blog/create"
      class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">create</a>
  </div>
  @foreach ($posts as $post)
  <div class="flex justify-between border-b border-gray-200 py-5 my-5">
    <div>
      <h1 class="text-2xl">
        <a href="/blog/{{ $post->id }}">{{ $post->title }} </a>
       </h1>
      <p class="text-1xl">{{ $post->author }}</p>

    </div>

    <div>
      <a class="hover:text-gray-500 text-yellow-500" href="/blog/{{ $post->id }}/edit">edit</a>
      <form action="/blog/{{ $post->id }}" method="post" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
        @csrf
        @method('DELETE')

      <button type="submit" class="text-red-500 hover:text-gray-500">delete</button>

      </form>
    </div>

  </div>


  @endforeach

  {{ $posts->links()}}
</x-layout>