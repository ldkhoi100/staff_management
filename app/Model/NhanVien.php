<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhanVien extends Model
{
    use SoftDeletes;

    protected $table = 'nhan_vien';
    protected $primaryKey = 'id';

    protected $fillable = [
        'MaCV', 'He_So_Luong', 'Ho_Ten', 'Ngay_Sinh', 'Gioi_Tinh', 'So_Dien_Thoai', 'Dia_Chi', 'So_Phep_Con_Lai',
        'Anh_Dai_Dien', 'Ngay_Bat_Dau_Lam', 'Ngay_Nghi_Viec', 'Phu_Cap', 'Tam_Ung'
    ];

    public function cham_cong()
    {
        return $this->hasMany("App\Model\ChamCong", 'Ma_NV', 'id');
    }

    public function don_xin_phep()
    {
        return $this->hasMany("App\Model\DonXinPhep", 'MaNV', 'id');
    }

    public function chuc_vu()
    {
        return $this->belongsTo("App\Model\ChucVu", 'Ten_CV', 'id');
    }
}