<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'bio',
        'category_id',
        'img',
        'size',
        'country',
        'city',
        'address',
        'socials',
        'created_by',
        'updated_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($company) {
            // Delete associated image when the company is deleted
            if ($company->img) {
                // Assuming 'uploads' is the directory where your images are stored
                $imagePath = public_path('uploads/' . $company->img);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        });
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
