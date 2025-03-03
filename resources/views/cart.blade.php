<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-semibold mb-6">Your Shopping Cart</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            @foreach($cartItems as $cartItem)
                <div class="flex items-center justify-between border-b py-4 cart-item" data-price="{{ $cartItem->book->price }}">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $cartItem->book->cover_image) }}" alt="{{ $cartItem->book->title }}" class="w-20 h-auto mr-4">
                        <div>
                            <h3 class="font-semibold">{{ $cartItem->book->title }}</h3>
                            <p class="text-sm text-gray-600">by {{ $cartItem->book->author }}</p>
                            <p class="text-orange-600 font-bold">${{ number_format($cartItem->book->price, 2) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <form action="{{ route('cart.update', $cartItem) }}" method="POST" class="flex items-center mr-4">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="w-16 border rounded p-1 mr-2">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded">Update</button>
                        </form>
                        <form action="{{ route('cart.remove', $cartItem) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="mt-6 flex justify-between items-center">
                <h2 class="text-xl font-semibold">Total:</h2>
                <span id="cart-total" class="text-xl font-bold text-orange-600">${{ number_format($total, 2) }}</span>
            </div>

            <div class="mt-6">
                <a href="{{ route('checkout') }}" class="bg-orange-600 text-white py-2 px-4 rounded hover:bg-orange-700">Proceed to Checkout</a>
            </div>
        @endif
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('input[name="quantity"]');

            quantityInputs.forEach(input => {
                input.addEventListener('change', updateCartTotal);
            });

            function updateCartTotal() {
                let total = 0;

                document.querySelectorAll('.cart-item').forEach(item => {
                    const price = parseFloat(item.getAttribute('data-price'));
                    const quantity = parseInt(item.querySelector('input[name="quantity"]').value);
                    total += price * quantity;
                });

                document.querySelector('#cart-total').textContent = '$' + total.toFixed(2);
            }
        });
    </script>
</x-app-layout>