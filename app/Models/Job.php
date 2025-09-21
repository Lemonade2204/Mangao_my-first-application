<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Job extends Model
{
use HasFactory;
// By convention, Laravel assumes a 'jobs' table.
// We need to tell it to use our 'job_listings' table instead.
protected $table = 'job_listings';

// in app/Models/Job.php
public function employer()
{
return $this->belongsTo(\App\Models\Employer::class);
}

// in app/Models/Job.php
public function tags()
{
return $this->belongsToMany(\App\Models\Tag::class, foreignPivotKey:
"job_listing_id");
}
}

