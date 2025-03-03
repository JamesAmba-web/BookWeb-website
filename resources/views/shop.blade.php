<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-8">
            <div>
                </div>
            <div>
            <a href="{{ route('cart') }}" class="relative text-gray-600 hover:text-orange-600 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-1.707 1.107-2.707.5C10.592 17 12 18.408 12 20.408a1 1 0 01-1 1h-2a1 1 0 01-1-1c0-2.001 1.408-3.408 3.408-3.408z" />
                </svg>
            Cart
            @auth
        @php
            $cartCount = \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity');
                @endphp
                @if($cartCount > 0)
                    <span class="absolute -top-2 -right-2 bg-orange-600 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">
                    {{ $cartCount }}
                    </span>
                @endif
            @endauth
        </a>
            </div>
        </div>

        <div class="mb-8 flex flex-col md:flex-row gap-4">
            <div class="w-full md:w-2/3">
                <input type="text"
                       placeholder="Search for books..."
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
            </div>
            <div class="w-full md:w-1/3 flex gap-4">
                <select class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    <option value="">All Categories</option>
                    <option value="fiction">Fiction</option>
                    <option value="non-fiction">Non-Fiction</option>
                    <option value="mystery">Mystery</option>
                </select>
                <select class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    <option value="newest">Newest</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($books as $book)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ $book->image_path ?? '/images/placeholder.jpg' }}"  {{-- Use $book->image_path --}}
                         alt="{{ $book->title }}"
                         class="w-full h-48 object-cover md:w-48 md:h-64 lg:w-64 lg:h-96"> 
                         <div class="p-4 flex flex-col justify-between min-h-[190px]">
        <div class="content">
            <h3 class="text-lg font-semibold text-gray-900">{{ $book->title }}</h3>
                <p class="text-sm text-gray-600">by {{ $book->author }}</p>
                <p class="mt-2 text-orange-600 font-bold">${{ number_format($book->price, 2) }}</p>
        </div>
                <form action="{{ route('cart.add', $book) }}" method="POST" class="mt-4">
                 @csrf
                <button type="submit" class="w-full bg-orange-600 text-white py-2 text-sm rounded hover:bg-orange-700">
            Add to Cart
        </button>
    </form>
</div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>