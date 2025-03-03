<x-app-layout>
    <div class="bg-gray-50 flex flex-col items-center justify-center min-h-screen">
        <div class="px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl md:text-6xl">
                Welcome to <span class="text-orange-600">BookWeb</span>
            </h1>
            <p class="mt-3 text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl">
                Discover your next favorite book. Browse our collection of books across various genres.
            </p>
            <div class="mt-5 sm:flex sm:justify-center md:mt-8">
                <div class="rounded-md shadow">
                    <a href="{{ route('shop') }}" 
                       class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 md:py-4 md:text-lg md:px-10">
                        Browse Books
                    </a>
                </div>

                {{-- Added Donate Books button --}}
                <div class="rounded-md shadow ml-4"> 
                    <a href="{{ route('donate') }}"  {{-- Replace 'donate' with your actual route name --}}
                       class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 md:py-4 md:text-lg md:px-10">
                        Donate Books
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>