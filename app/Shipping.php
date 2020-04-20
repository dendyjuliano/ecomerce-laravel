<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'tbl_shipping';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'email', 'phone', 'notes', 'order_date', 'pay_limit'];
}
