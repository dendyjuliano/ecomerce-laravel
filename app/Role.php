<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class Role extends Model
{
    protected $table = 'tbl_role';
    protected $primaryKey = 'id';
}
