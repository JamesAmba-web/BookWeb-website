<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Order Summary -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold mb-6">Order Summary</h2>
                
                @foreach($cartItems as $item)
                    <div class="flex items-center mb-4 pb-4 border-b">
                        <img src="{{ $item->book->cover_image ?? '/images/placeholder.jpg' }}" 
                             alt="{{ $item->book->title }}"
                             class="w-16 h-24 object-cover rounded">
                        <div class="ml-4">
                            <h3 class="font-semibold">{{ $item->book->title }}</h3>
                            <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                            <p class="text-orange-600 font-bold">${{ number_format($item->book->price * $item->quantity, 2) }}</p>
                        </div>
                    </div>
                @endforeach

                <div class="flex justify-between items-center mt-6">
                    <p class="text-lg font-bold">Total:</p>
                    <p class="text-2xl font-bold text-orange-600">${{ number_format($total, 2) }}</p>
                </div>
            </div>

            <!-- Shipping Information -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold mb-6">Shipping Information</h2>

                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 mb-2">Shipping Address</label>
                            <input type="text" name="shipping_address" required
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 mb-2">City</label>
                            <input type="text" name="shipping_city" required
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 mb-2">Phone Number</label>
                            <input type="text" name="shipping_phone" required
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        </div>

                        <button type="submit" 
                                class="w-full bg-orange-600 text-white py-3 rounded-md hover:bg-orange-700 mt-6">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>