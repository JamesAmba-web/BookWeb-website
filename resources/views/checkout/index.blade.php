<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Show any errors -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Show success message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <!-- Order Summary -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-2xl font-bold mb-4">Order Summary</h2>
                @foreach($cartItems as $item)
                    <div class="flex items-center border-b py-4">
                        <div class="flex-1">
                            <h3 class="font-semibold">{{ $item->book->title }}</h3>
                            <p>Quantity: {{ $item->quantity }}</p>
                            <p class="text-orange-600">${{ number_format($item->book->price * $item->quantity, 2) }}</p>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4 text-right">
                    <p class="text-lg font-bold">Total: ${{ number_format($total, 2) }}</p>
                </div>
            </div>

            <!-- Shipping Information -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold mb-4">Shipping Information</h2>
                <div class="space-y-4">
                    <div>
                        <label for="shipping_address" class="block text-gray-700">Shipping Address</label>
                        <input type="text" 
                               name="shipping_address" 
                               id="shipping_address" 
                               value="{{ old('shipping_address') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                               required>
                    </div>

                    <div>
                        <label for="shipping_city" class="block text-gray-700">City</label>
                        <input type="text" 
                               name="shipping_city" 
                               id="shipping_city" 
                               value="{{ old('shipping_city') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                               required>
                    </div>

                    <div>
                        <label for="shipping_phone" class="block text-gray-700">Phone Number</label>
                        <input type="text" 
                               name="shipping_phone" 
                               id="shipping_phone" 
                               value="{{ old('shipping_phone') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                               required>
                    </div>

                    <button type="submit" 
                            class="w-full bg-orange-600 text-white py-3 rounded-md hover:bg-orange-700">
                        Place Order
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>