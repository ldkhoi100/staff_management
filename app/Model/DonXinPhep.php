<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonXinPhep extends Model
{
    use SoftDeletes;

    protected $table = 'don_xin_phep';

    protected $fillable = ['MaNV','TieuDe','NoiDung'];

    public function nhan_vien()
    {
        return $this->hasMany("App\Model\NhanVien", 'MaNV', 'id');
    }

}
