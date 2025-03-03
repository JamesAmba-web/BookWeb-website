<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Donate a Book</h1>
            <p class="mt-2 text-gray-600">Share your books with others who might need them</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 max-w-2xl mx-auto">
            <form action="{{ route('donations.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="book_title" class="block text-sm font-medium text-gray-700">Book Title</label>
                    <input type="text" name="book_title" id="book_title" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                           required>
                </div>

                <div>
                    <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                    <input type="text" name="author" id="author" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                           required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" 
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                </div>

                <div>
                    <label for="condition" class="block text-sm font-medium text-gray-700">Book Condition</label>
                    <select name="condition" id="condition" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                            required>
                        <option value="">Select condition</option>
                        <option value="new">New</option>
                        <option value="like_new">Like New</option>
                        <option value="good">Good</option>
                        <option value="fair">Fair</option>
                    </select>
                </div>

                <div>
                    <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="text" name="contact_number" id="contact_number" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                           required>
                </div>

                <div>
                    <label for="pickup_address" class="block text-sm font-medium text-gray-700">Pickup Address</label>
                    <textarea name="pickup_address" id="pickup_address" rows="2" 
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                              required></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-orange-600 text-gray px-6 py-2 rounded-md hover:bg-orange-700">
                        Submit Donation
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>