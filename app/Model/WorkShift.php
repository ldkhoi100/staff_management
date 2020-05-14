<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkShift extends Model
{
    use SoftDeletes;

    protected $table = 'ca_lam';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Ca', 'He_So','Mo_Ta'
    ];

    public function nhanvien(){
        return $this->belongsToMany(NhanVien::class, 'mavn_calam', 'Ca_Lam','id');
    }
}
