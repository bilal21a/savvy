<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategories extends Model
{
    use HasFactory;
    public function parent(){
        return $this->hasOne(ProductCategories::class,"id","category_id");
    }
    public function products(){
        return $this->hasMany(Products::class,"sub_category_id","id");
    }
}
