<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'bio',
        'category_id',
        'img',
        'size',
        'founder',
        'founded',
        'country',
        'city',
        'address',
        'socials',
        'created_by',
        'updated_by',
    ];

    public function forceDelete()
    {
        // Delete associated photo from storage
        $thumbnailPath = public_path('uploads/') . $this->thumbnail;
        if (File::exists($thumbnailPath)) {
            File::delete($thumbnailPath);
        }

        $imgPath = public_path('uploads/') . $this->img;
        if (File::exists($imgPath)) {
            File::delete($imgPath);
        }

        // Continue with the regular delete
        parent::forceDelete();
    }

    public function employer()
    {
        return $this->hasMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id');
    }
}
