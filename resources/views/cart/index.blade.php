<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-bold mb-6">Your Shopping Cart</h2>

        @if($cartItems->count() > 0)
            <div class="bg-white rounded-lg shadow p-6">
                @foreach($cartItems as $item)
                    <div class="flex items-center border-b py-4">
                        <img src="{{ $item->book->cover_image ?? '/images/placeholder.jpg' }}"
                             alt="{{ $item->book->title }}"
                             class="w-20 h-28 object-cover">

                        <div class="ml-4 flex-1">
                            <h3 class="font-semibold">{{ $item->book->title }}</h3>
                            <p class="text-sm text-gray-600">by {{ $item->book->author }}</p>
                            <p class="mt-1">${{ number_format($item->book->price, 2) }}</p>

                            <div class="flex items-center mt-2">
                                <span class="mr-2">Quantity:</span>
                                <input type="number" value="{{ $item->quantity }}" min="1"
                                       class="w-16 rounded border-gray-300">

                                <form action="{{ route('cart.remove', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 ml-4">Remove</button>
                                </form>
                            </div>
                        </div>

                        <div class="text-right">
                            <p class="font-bold">${{ number_format($item->book->price * $item->quantity, 2) }}</p>
                        </div>
                    </div>
                @endforeach

                <div class="mt-6 border-t pt-6">
                    <div class="flex justify-between items-center">
                        <p class="text-xl font-bold">Total:</p>
                        <p class="text-2xl font-bold text-orange-600">${{ number_format($total, 2) }}</p>
                    </div>

                    <a href="{{ route('checkout') }}"
                       class="mt-6 block w-full bg-orange-600 text-gray-900 text-center py-3 rounded-md hover:bg-orange-700 transition-colors">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-lg shadow">
                <p class="text-gray-500">Your cart is empty.</p>
                <a href="{{ route('shop') }}"
                   class="inline-block mt-4 text-orange-600 hover:text-orange-700">
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</x-app-layout>