<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-bold mb-6">My Donations</h2>

        @if($donations->count() > 0)
            <div class="space-y-6">
                @foreach($donations as $donation)
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $donation->book_title }}</h3>
                                <p class="text-gray-600">by {{ $donation->author }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm 
                                @if($donation->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($donation->status === 'approved') bg-green-100 text-green-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($donation->status) }}
                            </span>
                        </div>

                        <div class="mt-4 text-gray-600">
                            <p><strong>Condition:</strong> {{ ucfirst($donation->condition) }}</p>
                            @if($donation->description)
                                <p><strong>Description:</strong> {{ $donation->description }}</p>
                            @endif
                            <p><strong>Contact:</strong> {{ $donation->contact_number }}</p>
                            <p><strong>Pickup Address:</strong> {{ $donation->pickup_address }}</p>
                            <p class="text-sm mt-2">Submitted on {{ $donation->created_at->format('F j, Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <p class="text-gray-600">You haven't made any donations yet.</p>
                <a href="{{ route('donate') }}" 
                   class="inline-block mt-4 bg-orange-600 text-white px-6 py-2 rounded-md hover:bg-orange-700">
                    Donate a Book
                </a>
            </div>
        @endif
    </div>
</x-app-layout>