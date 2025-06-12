<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#001114] text-[#1b1b18] flex p-6 lg:p-8 py-0 min-h-screen flex-col">

<header class="sticky top-0 py-6 border-b-gray-400 backdrop-blur-2xl border-b-2 pb-3 mb-12 flex self-center w-full lg:max-w-5xl max-w-[335px] text-sm items-center">
    <nav class="flex justify-between w-full">
        <h1 class="text-white text-3xl">Categories</h1>

        <div class="flex justify-end w-full gap-6">
            <a class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
               href="{{ route('categories.create') }}">
                Create New Category
            </a>

            <a class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
               href="{{ route('products.index') }}">
                All Products
            </a>

            <a class="" href="{{ route('index') }}">
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 24 24">
                    <path d="M 12 2.0996094 L 1 12 L 4 12 L 4 21 L 11 21 L 11 15 L 13 15 L 13 21 L 20 21 L 20 12 L 23 12 L 12 2.0996094 z M 12 4.7910156 L 18 10.191406 L 18 11 L 18 19 L 15 19 L 15 13 L 9 13 L 9 19 L 6 19 L 6 10.191406 L 12 4.7910156 z"></path>
                </svg>
            </a>
        </div>
    </nav>
</header>

<div class="w-full lg:max-w-4xl max-w-[335px] flex self-center flex-col">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($categories as $category)
            <div class="border border-gray-300 rounded-md p-6 bg-white shadow-sm dark:bg-gray-800">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">
                    <a href="{{ route('categories.show', $category) }}" class="hover:underline">
                        {{ $category->name }}
                    </a>
                </h2>
                @if($category->description)
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">{{ $category->description }}</p>
                @endif
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $category->products_count }} {{ Str::plural('product', $category->products_count) }}
                </p>
                <a href="{{ route('categories.show', $category) }}"
                   class="inline-block mt-4 px-4 py-2 bg-lime-500 text-white rounded hover:bg-lime-600 text-sm">
                    View Products
                </a>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
