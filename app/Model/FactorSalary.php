<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FactorSalary extends Model
{
    use SoftDeletes;

    protected $table = 'he_so_luong';
    protected $primaryKey = 'id';

    protected $fillable = [
        'He_So_Luong'
    ];

    public function nhan_vien()
    {
        return $this->hasMany(NhanVien::class, 'Ma_Luong', 'id');
    }
}
