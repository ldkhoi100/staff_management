<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChamCong extends Model
{
    use SoftDeletes;

    use SoftDeletes;

    protected $table = 'cham_cong_ngay';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Ten_CV', 'Cong_Viec', 'Bac_Luong'
    ];

    public function nhan_vien()
    {
        return $this->hasMany("App\Model\NhanVien", 'Ten_CV', 'id');
    }
}