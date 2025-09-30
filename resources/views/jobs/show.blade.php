<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <div class="flex justify-center mt-12">
        <div class="w-full max-w-md">
            <!-- Back to Jobs -->
            <div class="mb-4">
                <a href="/jobs" class="text-sm font-medium text-indigo-600 hover:underline">
                    ← Back to Jobs
                </a>
            </div>

            <!-- Job Card -->
            <div class="bg-white shadow-lg rounded-2xl p-8 text-center">
                <p class="text-sm text-gray-500 mb-2">{{ $job->employer->name }}</p>
                <h2 class="font-bold text-xl text-gray-800 mb-4">{{ $job['title'] }}</h2>
                <p class="text-gray-600 mb-6">
                    This job pays <span class="font-semibold text-gray-900">{{ $job['salary'] }}</span> per year.
                </p>

                <div class="px-4 py-4">
                    @foreach($job->tags as $tag)
                    <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5
                    rounded-full">{{ $tag->name }}</span>
                    @endforeach
                </div>
                
                <div class="flex justify-center gap-4">
                    <a href="/jobs/{{ $job->id }}/edit"
                       class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 shadow">
                        Edit Job
                    </a>

                    <button form="delete-form"
                            class="inline-flex items-center rounded-lg bg-red-100 px-4 py-2 text-sm font-semibold text-red-600 hover:bg-red-200 shadow">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Delete Form -->
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>