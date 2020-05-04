<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';

    //Relationship many-to-many to table users
    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
}