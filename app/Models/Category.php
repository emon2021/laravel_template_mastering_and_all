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

    //__mutetors__//__mutetor changed the column behabior in database__//
    public function setCategoryNameAttribute($value) // setAtrribute with column name in camelCase
    {
        return $this->attributes['category_name'] = ucfirst($value); //mutetor use attributes['column name']
    }
}
