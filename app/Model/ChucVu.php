<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChucVu extends Model
{
    use SoftDeletes;

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
