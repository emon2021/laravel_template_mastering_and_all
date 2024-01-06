<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    use HasFactory;
    //fillabe column in subCategory table
    protected $fillable = [
        'subcategory_name',
        'subcategory_slug',
    ];
    //one to one relation with categories table
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','category_id');
    }
}
