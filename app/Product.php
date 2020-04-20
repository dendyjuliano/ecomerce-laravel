<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    protected $table = 'tbl_product';
    protected $primaryKey = 'id';
    protected $fillable = ['product_name', 'category_id', 'product_price', 'status', 'product_image'];

    public function categorys()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
