<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('home');
});

Route::resource('jobs', JobController::class);

// Route::get('/jobs', [JobController::class, 'index']);
// // in routes/web.php
// // Show Create Form
// Route::get('/jobs/create', [JobController::class, 'create']);
// Route::get('/jobs/{job}', [JobController::class, 'show']);


// // in routes/web.php
// // in routes/web.php
// Route::post('/jobs',[JobController::class, 'store']);

// // in routes/web.php
// // Show Edit Form
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
// // Update a Job
// Route::patch('/jobs/{job}', [JobController::class, 'update']);

// // in routes/web.php
// // Destroy a Job
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);