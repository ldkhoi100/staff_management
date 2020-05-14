<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChamCong extends Model
{
    use SoftDeletes;


    protected $table = 'cham_cong_ngay';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Ngay_Hien_Tai', 'So_Ca_lam', 'Ngay_Le','Ghi_Chu'
    ];

    public function nhan_vien()
    {
        return $this->hasMany("App\Model\NhanVien", 'Ten_CV', 'id');
    }
}
