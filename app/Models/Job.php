<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'my_jobs';

    protected $fillable = [
        'title',
        'description',
        'location',
        'salary',
        'job_type',
        'status',
        'requirements',
        'company_id',
        'category_id',
        'application_deadline',
        'experience_level',
        'remote_possible',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function savedUsers()
    {
        return $this->belongsToMany(User::class, 'saved_jobs', 'job_id', 'user_id')->withTimestamps();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
