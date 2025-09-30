<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <!-- Vertical Job Cards -->
    <div class="space-y-6 mt-8">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" 
               class="block bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition p-6 flex flex-col h-full">
                
                <!-- Employer -->
                <div class="text-sm font-medium text-indigo-600 mb-2">
                    {{ $job->employer->name }}
                </div>

                <!-- Title -->
                <h2 class="text-xl font-bold text-gray-800 mb-2">
                    {{ $job['title'] }}
                </h2>

                <!-- Salary -->
                <p class="text-gray-600 mb-4">
                    Pays <span class="font-semibold text-gray-900">{{ $job['salary'] }}</span> per year
                </p>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mt-auto">
                    @foreach($job->tags as $tag)
                        <span class="bg-gray-100 text-gray-700 text-xs font-medium px-3 py-1 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </a>
        @endforeach
    </div>

    <!-- Pagination pinned at bottom -->
    <div class="mt-12 flex justify-center pb-6">
        {{ $jobs->links() }}
    </div>
</x-layout>
