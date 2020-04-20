<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shipping;
use App\Product;

class Transaction extends Model
{
    protected $table = 'tbl_transaction';
    protected $primaryKey = 'id';
    protected $fillable = ['id_shipping', 'id_product', 'quantity', 'price', 'size', 'product_image'];

    public function rl_shipping()
    {
        return $this->hasOne(Shipping::class, 'id', 'id_shipping');
    }

    public function rl_product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }
}
