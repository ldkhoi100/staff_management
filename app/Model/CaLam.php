<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaLam extends Model
{
    use SoftDeletes;

    protected $table = 'ca_lam';
    protected $fillable = ['Ca', 'He_So_Ca', 'Mo_Ta'];

    public function cham_cong()
    {
        return $this->hasMany(ChamCong::class, 'Ca_Lam', 'id')->withTrashed();
    }
}