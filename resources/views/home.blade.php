<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>

    <div class="max-w-3xl mx-auto text-center py-16">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Welcome to Our Job Portal</h1>
        <p class="text-lg text-gray-600 mb-8">
            Discover exciting opportunities and connect with top employers. 
            Browse available jobs or create your own listing today.
        </p>

        <a href="{{ url('/jobs') }}"
           class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
            View Jobs
        </a>
    </div>
</x-layout>
