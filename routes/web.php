<?php

use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Tag;

Route::get('/', function () {
return view('home');
});
Route::get('/jobs', function () {
return view('jobs.index', [
'jobs' => Job::with(['employer', 'tags'])->latest()->paginate(2)
]); 
});
// in routes/web.php
// Show Create Form
Route::get('/jobs/create', function () {
    return view('jobs.create', [
        'employees' => Employer::all(),
        'tags' => Tag::all()
    ]);
});
Route::get('/jobs/{job}', function (Job $job) {
return view('jobs.show', [
'job' => $job
]);
});


// in routes/web.php
// in routes/web.php
Route::post('/jobs', function () {
request()->validate([
'title' => ['required', 'min:3'],
'salary' => ['required']
]);
\App\Models\Job::create([
'title' => request('title'),
'salary' => request('salary'),
'employer_id' => 1
]);


return redirect('/jobs');
});

// in routes/web.php
// Show Edit Form
Route::get('/jobs/{job}/edit', function (\App\Models\Job $job) {
return view('jobs.edit', ['job' => $job]);
});
// Update a Job
Route::patch('/jobs/{job}', function (\App\Models\Job $job) {
// validation
request()->validate([
'title' => ['required', 'min:3'],
'salary' => ['required']
]);
// update
$job->update([
'title' => request('title'),
'salary' => request('salary'),
]);
// redirect
return redirect('/jobs/' . $job->id);
});

// in routes/web.php
// Destroy a Job
Route::delete('/jobs/{job}', function (Job $job) {
    $job->tags()->detach(); // cleanup pivot table
    $job->delete();

    return redirect('/jobs')->with('success', 'Job deleted successfully!');
});