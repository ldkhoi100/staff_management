<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    protected $table = 'role_user';
    protected $primaryKey = 'id';

    //Relationship many-to-many to table users
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}