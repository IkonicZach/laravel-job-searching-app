<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'responsibilities',
        'benefits',
        'requirements',
        'category_id',
        'subcategory_id',
        'min_salary',
        'max_salary',
        'employment_type',
        'type',
        'deadline',
        'status',
        'address',
        'country',
        'city',
        'created_by',
        'updated_by',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}