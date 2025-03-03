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

            <h2 class="text-2xl font-bold text-gray-900">Thank You!</h2>
            <p class="text-gray-600 mt-2">Your book donation has been submitted successfully.</p>
            <p class="text-gray-600 mt-2">We will contact you soon regarding the pickup.</p>

            <div class="mt-8">
                <a href="{{ route('donate') }}" 
                   class="inline-block bg-orange-600 text-white px-6 py-3 rounded-md hover:bg-orange-700">
                    Donate Another Book
                </a>
            </div>
        </div>
    </div>
</x-app-layout>