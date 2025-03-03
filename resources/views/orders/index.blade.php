<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-bold mb-6">Order History</h2>

        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h3 class="text-lg font-semibold">Order #{{ $order->id }}</h3>
                                <p class="text-gray-600">{{ $order->created_at->format('F j, Y') }}</p>
                            </div>
                            <span class="text-lg font-bold">${{ number_format($order->total_amount, 2) }}</span>
                        </div>

                        <!-- Order Items -->
                        <div class="border-t border-b border-gray-200 py-4 mb-4">
                            @foreach($order->items as $item)
                                <div class="flex justify-between items-center mb-2">
                                    <div>
                                        <p class="font-semibold">{{ $item->book->title }}</p>
                                        <p class="text-sm text-gray-600">Quantity: {{ $item->quantity }}</p>
                                    </div>
                                    <p>${{ number_format($item->price * $item->quantity, 2) }}</p>
                                </div>
                            @endforeach
                        </div>

                        <!-- Shipping Details -->
                        <div class="text-sm text-gray-600">
                            <p>Shipping Address: {{ $order->shipping_address }}</p>
                            <p>City: {{ $order->shipping_city }}</p>
                            <p>Phone: {{ $order->shipping_phone }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <p class="text-gray-600">You haven't placed any orders yet.</p>
                <a href="{{ route('shop') }}" 
                   class="inline-block mt-4 bg-orange-600 text-white px-6 py-2 rounded-md hover:bg-orange-700">
                    Browse Books
                </a>
            </div>
        @endif
    </div>
</x-app-layout>