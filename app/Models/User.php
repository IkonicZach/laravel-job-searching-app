<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory, Notifiable, HasApiTokens, HasRoles, SoftDeletes;

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
}
