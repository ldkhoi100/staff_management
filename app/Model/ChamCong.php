<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChamCong extends Model
{
    use SoftDeletes;

<<<<<<< HEAD

=======
>>>>>>> acf3b603c43324a2f0e3b6183cb579266c689549
    protected $table = 'cham_cong_ngay';
    protected $primaryKey = 'id';

    protected $fillable = [
<<<<<<< HEAD
        'Ngay_Hien_Tai', 'So_ca_lam', 'Ngay_Le','Ghi_Chu'
=======
        'MaNV', 'LuongCB', 'Ca_Lam', 'Ngay_Hien_Tai', 'Ngay_Le', 'Tru_Luong', 'Ghi_Chu'
>>>>>>> acf3b603c43324a2f0e3b6183cb579266c689549
    ];

    public function nhan_vien()
    {
        return $this->belongsTo("App\Model\NhanVien", 'MaNV', 'id')->withTrashed();
    }

    public function luongCB()
    {
        return $this->belongsTo("App\Model\BaseSalary", 'LuongCB', 'id')->withTrashed();
    }

    public function ca_lam()
    {
        return $this->belongsTo("App\Model\BaseSalary", 'Ca_Lam', 'id')->withTrashed();
    }
}
