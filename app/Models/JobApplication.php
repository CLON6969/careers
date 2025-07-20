<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_post_id',
        'cover_letter',
        'cv',
        'answers',
        'status',
        'submitted_at',
    ];

    protected $casts = [
        'answers' => 'array',
        'submitted_at' => 'datetime',
    ];

    // Applicant relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Job post relationship
    public function job()
    {
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }

  public function jobPost()
{
    return $this->belongsTo(JobPost::class, 'job_post_id');
}


}
