<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-xl text-red-500">Home</h2>
            <a href="{{ route('create') }}" class="px-4 py-2 text-white bg-green-600 rounded">Add Post</a>

        </div>
        @if (session('success'))
            <h2 class="text-green-600">{{ session('success') }}</h2>
        @endif

        <div class="mt-3 row">
            <div class="col-8 overflow-hide">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Name</th>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Description</th>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Image</th>
                            <th
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="border-b border-gray-200">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    {{ $post->name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $post->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="images/{{ asset($post->image) }}" alt="Item Image"
                                        class="object-cover w-12 h-12 rounded">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a class="px-4 py-2 mr-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                                        href="{{ route('edit', $post->id) }}">Edit</a>
                                    {{-- <a class="px-4 py-2 mr-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                                        href="{{ route('delete', $post->id) }}">Delete</a> --}}

                                    <form method="post" action="{{ route('delete', $post->id) }}" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="px-4 py-2 mr-2 font-bold text-white bg-red-500 rounded hover:bg-blue-700">Delete</button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        <!-- Add more rows here -->
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>


</html>
