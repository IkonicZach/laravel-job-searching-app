<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    protected $rememberTokenName = 'remember_token';
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
        'img',
        'company_id',
        'position',
        'age',
        'phone',
        'country',
        'city',
        'skills',
        'preferred_category',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'created_by');
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }
}
