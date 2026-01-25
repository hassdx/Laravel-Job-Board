<x-layout :title="$pageTitle">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
    <p>{{ $post->author }}</p>

    <ul class="mt-6 list-disc list-inside text-sm/6 text-gray-700">
        @foreach ($post->comments as $comment )
        <li class="p-4 bg-gray-100 rounded-md shadow-sm">
            <p class="text-gray-800">{{ $comment->content }}</p>
            <span class="mt-1 text-sm text-gray-800">{{ $comment->author }}</span>
        </li>

        @endforeach
    </ul>

    <div class="border border-gray-300 px-3 py-2 mt-2">
        <form method="post" action="/comments">
            @csrf

            <input type="text" name="post_id" value="{{ $post->id }}" hidden>
            
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">


                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                        <div class="col-span-full">
                            <label for="author" class="block text-sm/6 font-medium text-gray-900">Your Name</label>
                            <div class="mt-2">
                                <input id="author" type="text" value="{{ old('author') }}" name="author" autocomplete="family-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            </div>
                            @error('author')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>

                            @enderror
                        </div>


                        <div class="col-span-full">
                            <label for="content" class="block text-sm/6 font-medium text-gray-900">Your Comment</label>
                            <div class="mt-2">
                                <textarea id="content" name="content" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('content') }}</textarea>
                            </div>

                            <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the article.</p>

                            @error('content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>

                            @enderror
                        </div>


                    </div>
                </div>




            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/blog" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>






</x-layout>