<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'responsibilities', 'benefits',
        'employment_type', 'work_setup', 'location', 'country', 'department',
        'level', 'salary_range', 'application_deadline', 'status', 'posted_by',
    ];

    protected $casts = [
        'application_deadline' => 'date',
    ];

    public function skills()
    {
        return $this->hasMany(JobSkill::class);
    }

    public function experiences()
    {
        return $this->hasMany(JobExperience::class);
    }

    public function qualifications()
    {
        return $this->hasMany(JobQualification::class);
    }

    public function questions()
    {
        return $this->hasMany(JobQuestion::class);
    }

    

    

    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
