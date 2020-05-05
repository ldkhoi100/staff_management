<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BacLuong extends Model
{
    use SoftDeletes;

    protected $table = 'bac_luong';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Bac_Luong'
    ];

    public function luong_co_ban()
    {
        return $this->belongsTo(LuongCoBan::class, 'LuongCB');
    }

    public function nhan_vien()
    {
        return $this->hasMany(NhanVien::class, 'Ma_Luong', 'id');
    }
}
