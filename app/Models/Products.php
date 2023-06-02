<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function category(){
        return $this->hasOne(ProductSubCategories::class,"id","sub_category_id");
    }
    public function section(){
        return $this->hasOne(ProductSections::class,"id","section_id");
    }
    public function links(){
        return $this->hasMany(ProductLinks::class,"product_id","id");
    }
    public function images(){
        return $this->hasMany(ProductImages::class,"product_id","id");
    }
}
