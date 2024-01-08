<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'age',
        'img',
        'email',
        'phone',
        'linkedin',
        'address',
        'education_status',
        'degree',
        'institution_name',
        'major',
        'graduation_date',
        'job_title',
        'company_name',
        'location',
        'start_date',
        'end_date',
        'job_description',
        'skills',
        'certificate',
        'certificate_issuing_org',
        'obtained_date',
        'goals',
        'project_name',
        'project_description',
        'technologies_used',
        'project_role',
        'award',
        'award_issuing_org',
        'received_date',
        'languages',
        'hobbies',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'skills' => 'json',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
