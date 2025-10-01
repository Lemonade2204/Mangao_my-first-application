<?php
namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
class JobController extends Controller
{
// in JobController.php
public function index()
{
    return view('jobs.index', [
'jobs' => Job::with(['employer', 'tags'])->latest()->paginate(2)
]); 
}

public function create() {
    $employers = Employer::all();
        $tags = Tag::all();

        return view('jobs.create', [
            'employers' => $employers,
            'tags' => $tags,
        ]);
}

public function show(Job $job) {
    return view('jobs.show', [
        'job' => $job
    ]);
}
public function store() 
{
$validated = request()->validate([
            'title'       => 'required|string|min:3',
            'salary'      => 'required|string',
            'employer_id' => 'required|exists:employers,id',
            'tags'        => 'array',
            'tags.*'      => 'exists:tags,id',
        ]);

        // Only fill the Job fields (exclude tags)
        $job = Job::create([
            'title'       => $validated['title'],
            'salary'      => $validated['salary'],
            'employer_id' => $validated['employer_id'],
        ]);

        // Attach tags if selected
        if (!empty($validated['tags'])) {
            $job->tags()->attach($validated['tags']);
        }

        return redirect('/jobs');

    // request()->validate([
    //     'title' => ['required', 'min:3'],
    //     'salary' => ['required']
    // ]);
    // \App\Models\Job::create([
    //     'title' => request('title'),
    //     'salary' => request('salary'),
    //     'employer_id' => 1
    // ]);


    // return redirect('/jobs');
}

public function edit(Job $job) 
{
    return view('jobs.edit', ['job' => $job,
                             'employers' => Employer::all(),
                            'tags' => Tag::all()]);
}
public function update(Job $job) 
{
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
}
public function destroy(Job $job) 
{
    $job->tags()->detach(); // cleanup pivot table
    $job->delete();

    return redirect('/jobs')->with('success', 'Job deleted successfully!');
}
}