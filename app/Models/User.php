<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles, SoftDeletes;

    protected $rememberTokenName = 'remember_token';
    protected $fillable = [
        'name',
        'email',
        'password',
        'img',
        'cover',
        'bio',
        'company_id',
        'position',
        'birthday',
        'age',
        'phone',
        'country',
        'city',
        'skills',
        'preferred_category',
        'notification_preferences',
        'remember_token',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts = [
        'birthday' => 'date',
    ];

    public function getAge()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }

    public function bookmarkedJobs()
    {
        return $this->belongsToMany(Job::class, 'job_user', 'user_id', 'job_id')->withTimestamps();
    }

    public function bookmarkedUsers()
    {
        return $this->belongsToMany(User::class, 'user_user', 'user_id', 'bookmarked_user_id')->withTimestamps();
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'created_by');
    }

    public function user_skill()
    {
        return $this->belongsToMany(Skill::class, 'user_skill')->withPivot('proficiency');
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experiences::class);
    }
}
