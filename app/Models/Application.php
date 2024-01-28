<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;

class Application extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'user_id',
        'job_id',
        'email',
        'phone',
        'resume_path',
        'created_at',
        'updated_at',
    ];

    public function delete()
    {
        // Delete associated photo from storage
        $resumePath = public_path('downloads/resume/') . $this->resume_path;
        if (File::exists($resumePath)) {
            File::delete($resumePath);
        }

        // Continue with the regular delete
        parent::delete();
    }

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
