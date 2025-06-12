<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
    <body class="bg-[#FDFDFC] dark:bg-[#001114] text-[#1b1b18] flex p-6 lg:p-8 py-0 min-h-screen flex-col">

        <header class="sticky top-0 py-6 border-b-gray-400 backdrop-blur-2xl border-b-2 pb-3 mb-12 flex self-center w-full lg:max-w-5xl max-w-[335px] text-sm  not-has-[nav]:hidden items-center">
            <nav class="flex justify-between w-full">
                <h1 class="text-white text-3xl">Products</h1>

                <div class="flex justify-end w-full gap-6">

                                    @auth
                    <a class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        href="{{ route('products.create') }}">
                            Create New Product
                    </a>
                    @endauth

                    <a class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                       href="{{ route('cart.index') }}">
                        Cart ({{ app(App\Http\Controllers\CartController::class)->getCartCount() }})
                    </a>

                    <a class=""
                        href="{{ route('index') }}">
                        <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 24 24">
                            <path d="M 12 2.0996094 L 1 12 L 4 12 L 4 21 L 11 21 L 11 15 L 13 15 L 13 21 L 20 21 L 20 12 L 23 12 L 12 2.0996094 z M 12 4.7910156 L 18 10.191406 L 18 11 L 18 19 L 15 19 L 15 13 L 9 13 L 9 19 L 6 19 L 6 10.191406 L 12 4.7910156 z"></path>
                        </svg>
                    </a>
                </div>
            </nav>
        </header>

        <ul class=" w-full lg:max-w-4xl max-w-[335px] flex self-center flex-col">
            @foreach ($products as $product)
                <li class="border border-gray-300 rounded-md p-4 mb-4 bg-white shadow-sm dark:bg-gray-800 flex justify-between items-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100" class="mr-8">
                    @endif
                    <div class="mr-10 max-w-[70%]">
                        <h2 class=" border-b-white border-b-2 pb-2 text-lg font-semibold text-gray-800 dark:text-gray-200 w-fit px-4">
                            <a href="{{ route('products.show', ['product' => $product->slug]) }}"
                               class="hover:underline">
                                {{ $product->name }}
                            </a>
                        </h2>
                        <p class="mt-4 mb-4 text-sm text-gray-600 dark:text-gray-300">{{ $product->description }}</p>
                        @if($product->category)
                            <a href="{{ route('categories.show', $product->category) }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                                Category: {{ $product->category->name }}
                            </a>
                        @else
                            <span class="text-sm text-gray-600 dark:text-gray-400">Category: N/A</span>
                        @endif

                    </div>
                    <div class="flex flex-col gap-3 min-w-[15%]">
                        <p class="text-2xl font-bold text-gray-800 dark:text-red-400 text-right">{{ $product->price }},-</p>
                        <a class="transition-all hover:bg-lime-900 text-white bg-lime-500 px-5 py-2 rounded-sm border-white border-[1px]" href="">Add to cart</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </body>
</html>
