<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    use HasFactory;
    public function categories(){
        return $this->hasMany(ProductSubCategories::class,"category_id","id");
    }
}
