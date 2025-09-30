<x-layout>
<x-slot:heading>
Create Job
</x-slot:heading>
<!-- resources/views/jobs/create.blade.php  <form method="POST" action="/jobs"> -->
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Create Job</h2>

<!-- in resources/views/jobs/create.blade.php -->
<form method="POST" action="/jobs">
@csrf
<div class="space-y-12">
<div class="border-b border-gray-900/10 pb-12">
<h2 class="text-base font-semibold leading-7 text-gray-900">Edit
Job</h2>
<p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of
details from you.</p>
<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
<div class="sm:col-span-4">
<label for="title" class="block text-sm font-medium leading-6
text-gray-900">Title</label>
<div class="mt-2">
<div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300
focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600
sm:max-w-md">
<input type="text" name="title" id="title" class="block flex-1 border-0
bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0
sm:text-sm sm:leading-6" placeholder="Shift Leader" required>
</div>
</div>
</div>
<div class="sm:col-span-4">
<label for="salary" class="block text-sm font-medium leading-6
text-gray-900">Salary</label>
<div class="mt-2">
<div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300
focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600
sm:max-w-md">
<input type="text" name="salary" id="salary" class="block flex-1
border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400
focus:ring-0 sm:text-sm sm:leading-6" placeholder="$50,000 Per Year" required>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="submit" form="delete-form" class="text-sm text-red-600 hover:text-red-800">
                Delete
            </button>
<button type="button" class="text-sm font-semibold leading-6
text-gray-900">Cancel</button>
<button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm
font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline
focus-visible:outline-2 focus-visible:outline-offset-2
focus-visible:outline-indigo-600">Save</button>

</div>
</form>
<!-- Add this hidden form after the main edit form -->
<form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
@csrf
@method('DELETE')
</form>

</div>

</x-layout>