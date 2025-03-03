<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6">
                <!-- Book Image -->
                <div>
                    <img src="{{ $book->cover_image ?? '/images/placeholder.jpg' }}" 
                         alt="{{ $book->title }}" 
                         class="w-full h-96 object-cover rounded-lg">
                </div>

                <!-- Book Details -->
                <div class="space-y-4">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $book->title }}</h1>
                    <p class="text-xl text-gray-600">by {{ $book->author }}</p>
                    <p class="text-2xl font-bold text-orange-600">${{ number_format($book->price, 2) }}</p>
                    
                    <div class="border-t border-b border-gray-200 py-4 my-4">
                        <p class="text-gray-600">Category: {{ ucfirst($book->category) }}</p>
                        <p class="text-gray-600">Stock: {{ $book->stock }} available</p>
                    </div>

                    <div class="prose max-w-none">
                        <p>{{ $book->description }}</p>
                    </div>

                    <form action="{{ route('cart.add', $book) }}" method="POST" class="mt-6">
                        @csrf
                        <div class="flex items-center gap-4">
                            <label for="quantity" class="text-gray-700">Quantity:</label>
                            <select name="quantity" id="quantity" 
                                    class="rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                                @for ($i = 1; $i <= min(5, $book->stock); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <button type="submit" 
                                    class="px-8 py-3 bg-orange-600 text-white rounded-md hover:bg-orange-700">
                                Add to Cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Related Books -->
            <div class="p-6 border-t border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Related Books</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Add related books here -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>