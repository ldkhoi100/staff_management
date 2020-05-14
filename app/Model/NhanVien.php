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
        'MaCV', 'Ma_Luong', 'Ho_Ten', 'Ngay_Sinh', 'Gioi_Tinh', 'So_Dien_Thoai', 'Dia_Chi', 'So_Phep_Con_Lai'
    ];

    public function luong_co_ban()
    {
        return $this->belongsTo("App\Model\LuongCoBan", 'LuongCB', 'id');
    }


    public function cham_cong()
    {
        return $this->hasMany("App\Model\ChamCong", 'Ma_NV', 'id');
    }

    public function don_xin_phep()
    {
        return $this->belongsTo("App\Model\DonXinPhep", 'MaNV', 'id');
    }

    public function chuc_vu()
    {
        return $this->belongsTo("App\Model\ChucVu", 'Ten_CV', 'id');
    }



}
