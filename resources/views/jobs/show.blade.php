<x-layout>
<x-slot:heading>
Job
</x-slot:heading>
<!-- in job.blade.php -->
<p class="text-sm text-gray-500">{{ $job->employer->name }}</p>
<h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
<p>
This job pays {{ $job['salary'] }} per year.
</p>
<a href="/jobs/{{ $job->id }}/edit"
   class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
    Edit Job
</a>

</x-layout>