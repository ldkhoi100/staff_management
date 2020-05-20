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
        'Ca', 'Mo_Ta'
    ];

    public function nhan_vien()
    {
        return $this->hasMany(NhanVien::class, 'Ca_Lam', 'id')->withTrashed();
    }
}