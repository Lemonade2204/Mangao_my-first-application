<x-layout>
    <x-slot:heading>
       {{ $job->title }}
    </x-slot:heading>

    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Job</h2>

        <!-- Changed action to /jobs/{{ $job->id }} -->
        <form method="POST" action="/jobs/{{ $job->id }}">
            @csrf
            @method('PUT') <!-- Added this so Laravel treats it as an update -->

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Edit a Job</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <!-- Title -->
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <input type="text" name="title" id="title" 
                                    value="{{ old('title', $job->title) }}"
                                    class="block w-full rounded-md border-0 bg-gray-50 py-1.5 px-3 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                    focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader">
                            </div>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Salary -->
                        <div class="sm:col-span-4">
                            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                            <div class="mt-2">
                                <input type="text" name="salary" id="salary" 
                                    value="{{ old('salary', $job->salary) }}"
                                    class="block w-full rounded-md border-0 bg-gray-50 py-1.5 px-3 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                    focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="$50,000 Per Year">
                            </div>
                            @error('salary')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Employer -->
                        <div class="sm:col-span-4">
                            <label for="employer_id" class="block text-sm font-medium leading-6 text-gray-900">Employer</label>
                            <div class="mt-2">
                                <select name="employer_id" id="employer_id"
                                    class="block w-full rounded-md border-0 bg-gray-50 py-1.5 px-3 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                    sm:text-sm sm:leading-6">
                                    <option value="">Select Employer</option>
                                    @foreach ($employers as $employer)
                                        <option value="{{ $employer->id }}"
                                            {{ old('employer_id', $job->employer_id) == $employer->id ? 'selected' : '' }}>
                                            {{ $employer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('employer_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tags -->
                        <div class="sm:col-span-4">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Tags</label>
                            <div class="mt-2 flex flex-wrap gap-3">
                                @foreach ($tags as $tag)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                                            @if(in_array($tag->id, old('tags', $job->tags->pluck('id')->toArray()))) checked @endif
                                        >
                                        <span class="ml-2 text-sm text-gray-600">{{ $tag->name }}</span>
                                    </label>
                                @endforeach     
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Select one or more tags for this job.</p>
                            @error('tags')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/jobs" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                    hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                    focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</x-layout>


