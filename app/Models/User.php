<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'web';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_photo',
        'resume',
        'gender',
        'date_of_birth',
        'last_login_at',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
        'password' => 'hashed',
    ];
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function blog()
    {
        return $this->hasmany(Blog::class);
    }
};
