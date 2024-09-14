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
            <h2 class="text-xl text-red-500">Create</h2>
            <a href="/" class="px-4 py-2 text-white bg-green-600 rounded">Back Post</a>
        </div>
        <div class="">
            <form action="{{ route('store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" value="{{ old('name') }}" id="name" name="name"
                        class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Your name">
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="type" id="description" value="{{ old('description') }}" name="description"
                        class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Description">
                    @error('description')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" value="{{ old('image') }}"
                        class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image"
                        class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Description">
                    @error('image')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
