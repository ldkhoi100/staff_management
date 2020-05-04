<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'nhan_vien';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Ten_CV', 'Cong_Viec'
    ];

    public function nhan_vien()
    {
        return $this->hasMany("App\Model\NhanVien", 'MaCV', 'id');
    }
}