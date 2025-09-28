<?php
use Illuminate\Support\Facades\Route;
use App\Models\Job;
Route::get('/', function () {
return view('home');
});
// in routes/web.php
Route::get('/jobs', function () {
return view('jobs', [
'jobs' => \App\Models\Job::with('employer')->paginate(10)
]);
});
Route::get('/jobs/{id}', function ($id) {
return view('job', [
'job' => Job::find($id)
]);
});