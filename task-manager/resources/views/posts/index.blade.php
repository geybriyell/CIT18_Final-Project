<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Posts</h3>
                        <p class="text-sm text-gray-600">Manage your posts here.</p>
                    </div>
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">+ Create Post</a>
                </div>

                @if(session('success'))
                    <div class="mb-4 rounded-lg bg-green-50 border border-green-200 p-4 text-green-700">{{ session('success') }}</div>
                @endif

                @if($posts->isEmpty())
                    <div class="rounded-lg bg-blue-50 border border-blue-200 p-6 text-blue-700">You have no posts yet.</div>
                @else
                    <div class="space-y-4">
                        @foreach($posts as $post)
                            <div class="border rounded-lg p-4 shadow-sm">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <h4 class="text-xl font-semibold text-gray-900">{{ $post->title }}</h4>
                                        <p class="mt-2 text-gray-600">{{ $post->content }}</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

