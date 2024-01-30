<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'company_id',
        'title',
        'read_time',
        'thumbnail',
        'img',
        'intro',
        'body',
        'visual',
        'conclusion',
        'created_at',
        'updated_at',
        'deleted_at',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function blogcategories()
    {
        return $this->belongsToMany(Blogcategory::class);
    }
}
