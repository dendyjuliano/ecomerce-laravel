<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tbl_category';
    protected $fillable = ['category_name', 'status', 'image'];
}
