<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // Specify the primary key
    protected $primaryKey = 'category_id';
    //fillable all column
    protected $fillable = [
        'category_name',
        'category_slug',
    ];
}
