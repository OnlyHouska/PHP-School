<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 min-h-screen flex-col">

<header class="sticky top-0 py-6 border-b-gray-400 backdrop-blur-2xl border-b-2 pb-3 mb-12 flex self-center w-full lg:max-w-5xl max-w-[335px] text-sm  not-has-[nav]:hidden items-center">
    <nav class="flex justify-between w-full">
        <h1 class="text-white text-3xl">Create product</h1>

        <a class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
           href="{{ route('products.index') }}">
            Back to products
        </a>
    </nav>
</header>


<div class="flex self-center w-full lg:max-w-4xl max-w-[335px]">
    <form action="{{ route('products.store') }}" method="POST" class="text-white flex gap-3 flex-col items-start" enctype="multipart/form-data">
        @csrf
        <div class="border-gray-500 border-[1px] rounded-sm p-2 flex gap-4 ">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required class=" w-96 focus:outline-none">
        </div>
        <div class="border-gray-500 border-[1px] rounded-sm p-2 flex gap-4">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class=" w-96 focus:outline-none"></textarea>
        </div>
        <div class="border-gray-500 border-[1px] rounded-sm p-2 flex gap-4">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" required class=" w-96 focus:outline-none">
        </div>
        <div class="border-gray-500 border-[1px] rounded-sm p-2 flex gap-4">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required class="text-white bg-black max-w-fit">
                <option value="" class="">Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image">Product Image:</label>
            <input type="file" name="image" id="image" accept="image/*">
        </div>

        <button class="text-md mt-6 cursor-pointer inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm leading-normal" type="submit">Create Product</button>
    </form>
</div>

</body>
</html>
