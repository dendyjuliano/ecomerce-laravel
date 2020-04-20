<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Customer extends Model
{
    protected $table = 'tbl_customer';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'name', 'password', 'role_id'];

    public function roles()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
