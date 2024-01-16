<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Application extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'job_id',
        'email',
        'phone',
        'resume_path',
        'created_at',
        'updated_at',
    ];

    public function routeNotificationForMail()
    {
        return $this->email;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
