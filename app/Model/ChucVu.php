<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChucVu extends Model
{
    use SoftDeletes;

    protected $table = 'chuc_vu';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Ten_CV', 'Cong_Viec', 'Bac_Luong'
    ];

    public function nhan_vien()
    {
        return $this->hasMany("App\Model\NhanVien", 'MaCV', 'id')->withTrashed();
    }
}