<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BacLuong extends Model
{
    protected $table = 'bac_luong';
    protected $primaryKey = 'id';

    protected $fillable = [
        'LuongCB', 'Bac_Luong', 'HS_Luong'
    ];

    public function luong_co_ban()
    {
        return $this->belongsTo("App\Model\LuongCoBan", 'LuongCB', 'id');
    }

    public function nhan_vien()
    {
        return $this->hasMany("App\Model\NhanVien", 'Ma_Luong', 'id');
    }
}