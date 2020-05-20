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
        'MaCV', 'He_So_Luong', 'Ho_Ten', 'Ngay_Sinh', 'Gioi_Tinh', 'So_Dien_Thoai', 'Dia_Chi',
        'Anh_Dai_Dien', 'Ngay_Bat_Dau_Lam', 'Ngay_Nghi_Viec', 'Phu_Cap', 'Tam_Ung', 'hash', 'id', 'Ca_Lam'
    ];

    public function cham_cong()
    {
        return $this->hasMany(TimeSheets::class, 'MaNV', 'id')->withTrashed();
    }

    public function don_xin_phep()
    {
        return $this->hasMany("App\Model\DonXinPhep", 'MaNV', 'id')->withTrashed();
    }

    public function chuc_vu()
    {
        return $this->belongsTo("App\Model\ChucVu", 'MaCV', 'id')->withTrashed();
    }

    public function he_so_luong()
    {
        return $this->belongsTo("App\Model\FactorSalary", 'He_So_Luong', 'id')->withTrashed();
    }

    public function ca_lam()
    {
        return $this->belongsTo("App\Model\WorkShift", 'Ca_Lam', 'id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo("App\User", "id", "id")->withTrashed();
    }
}