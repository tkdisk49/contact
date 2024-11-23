<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('last_name', 'like', '%' . $keyword . '%')->orWhere('last_name', '=', $keyword)->orWhere('first_name', 'like', '%' . $keyword . '%')->orWhere('first_name', '=', $keyword)->orWhere('email', 'like', '%' . $keyword . '%')->orWhere('email', '=', $keyword);
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeDateSearch($query, $date)
    {
        if(!empty($date)) {
            $query->whereDate('created_at', $date);
        }
    }
}
