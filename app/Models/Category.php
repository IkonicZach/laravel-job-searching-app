<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
    ];

    public function company()
    {
        return $this->hasMany(Company::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
