<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#001114] text-[#1b1b18] flex p-6 lg:p-8 py-0 min-h-screen flex-col">

<header class="sticky top-0 py-6 border-b-gray-400 backdrop-blur-2xl border-b-2 pb-3 mb-12 flex self-center w-full lg:max-w-5xl max-w-[335px] text-sm items-center">
    <nav class="flex justify-between w-full">
        <h1 class="text-white text-3xl">Shopping Cart</h1>

        <div class="flex justify-end w-full gap-6">
            <a class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
               href="{{ route('products.index') }}">
                Continue Shopping
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

    @if($cartItems->count() > 0)
        <div class="space-y-4">
            @foreach($cartItems as $item)
                <div class="border border-gray-300 rounded-md p-4 bg-white shadow-sm dark:bg-gray-800 flex justify-between items-center">
                    @if($item->product->image)
                        <img src="{{ asset('storage/' . $item->product->image) }}"
                             alt="{{ $item->product->name }}"
                             width="80"
                             class="mr-4 rounded">
                    @endif

                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                            {{ $item->product->name }}
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            {{ $item->price }},- each
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center">
                            @csrf
                            @method('PATCH')
                            <input type="number"
                                   name="quantity"
                                   value="{{ $item->quantity }}"
                                   min="1"
                                   max="99"
                                   class="w-16 px-2 py-1 border border-gray-300 rounded text-center mr-2">
                            <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded text-sm hover:bg-blue-600">
                                Update
                            </button>
                        </form>

                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-800 dark:text-red-400">
                                {{ $item->total }},-
                            </p>
                        </div>

                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded text-sm hover:bg-red-600"
                                    onclick="return confirm('Remove this item?')">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="border-t pt-4 mt-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                        Total: {{ $total }},-
                    </h2>
                    <div class="flex gap-4">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600"
                                    onclick="return confirm('Clear entire cart?')">
                                Clear Cart
                            </button>
                        </form>

                        <form action="{{ route('cart.checkout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                    class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600"
                                    onclick="return confirm('Proceed with checkout? This will process your order.')">
                                Checkout
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-12">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Your cart is empty</h2>
            <a href="{{ route('products.index') }}"
               class="inline-block px-6 py-3 bg-lime-500 text-white rounded hover:bg-lime-600">
                Start Shopping
            </a>
        </div>
    @endif
</div>
</body>
</html>
