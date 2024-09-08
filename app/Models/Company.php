<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'company';

    protected $fillable = [
        'name',
        'email',
        'password',
        'website',
        'address',
        'description',
        'logo',
        'phone',
        'status',
        'industry',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
