<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Welcome, {{ Auth::user()->name }}!</h3>

                    <div class="mt-8">
                        <h4 class="text-md font-semibold mb-2">Upcoming Release Books:</h4>

                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            <div class="border rounded-lg p-4">
                                <img src="{{ asset('images/jujutsu-kaisen1.jpg') }}" alt="Upcoming Book 1" class="object-contain mb-4" style="height: 240px; width: 180px;">
                                <h5 class="text-lg font-semibold">Jujutsu Kaisen Volume 1</h5>
                                <p class="text-gray-600">Gege Akutami</p>
                            </div>

                            <div class="border rounded-lg p-4">
                                <img src="{{ asset('images/gravity-falls.png') }}" alt="Upcoming Book 2" class="object-contain mb-4" style="height: 240px; width: 180px;">
                                <h5 class="text-lg font-semibold">Gravity Falls Journal 3</h5>
                                <p class="text-gray-600">Alex Hirsch</p>
                            </div>

                            <div class="border rounded-lg p-4">
                                <img src="{{ asset('images/pcbuild.png') }}" alt="Upcoming Book 3" class="object-contain mb-4" style="height: 240px; width: 180px;">
                                <h5 class="text-lg font-semibold">Building the Pefect PC</h5>
                                <p class="text-gray-600">Robert Bruce</p>
                            </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>