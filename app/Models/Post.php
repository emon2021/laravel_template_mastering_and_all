<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\SubCategory;
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'subCat_id',
        'user_id',
        'title',
        'description',
        'image','slug',
        'post_date',
        'tags',
    ];

    //__join with categories table__//
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','category_id');
    }
    //__join with subCategoreis table__//
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subCat_id','id');
    }
    //__join with users table__//
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
