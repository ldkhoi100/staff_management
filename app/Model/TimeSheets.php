<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeSheets extends Model
{
    use SoftDeletes;

    protected $table = 'cham_cong_ngay';
    protected $primaryKey = 'id';

    protected $fillable = [
        'MaNV', 'LuongCB', 'Ca_Lam', 'Ngay_Hien_Tai', 'Ngay_Le', 'Luong', 'Ghi_Chu'
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
