<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="mb-6">
                <div class="mx-auto w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 max-w-full max-h-full text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
</svg>
                </div>
            </div>

            <h2 class="text-2xl font-bold text-gray-900">Thank you for your order!</h2>
            <p class="text-gray-600 mt-2">Order #{{ $order->id }}</p>

            <div class="mt-8 border-t border-b border-gray-200 py-6">
                <h3 class="text-lg font-semibold mb-4">Order Details</h3>
                
                @foreach($order->items as $item)
                    <div class="flex justify-between items-center mb-2">
                        <span>{{ $item->book->title }} ({{ $item->quantity }}x)</span>
                        <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                    </div>
                @endforeach

                <div class="mt-4 pt-4 border-t">
                    <div class="flex justify-between items-center font-bold">
                        <span>Total</span>
                        <span>${{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-6 text-left">
                <h3 class="text-lg font-semibold mb-2">Shipping Information</h3>
                <p>{{ $order->shipping_address }}</p>
                <p>{{ $order->shipping_city }}</p>
                <p>{{ $order->shipping_phone }}</p>
            </div>

            <div class="mt-8">
                <a href="{{ route('shop') }}" 
                   class="inline-block bg-orange-600 text-white px-6 py-3 rounded-md hover:bg-orange-700">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</x-app-layout>