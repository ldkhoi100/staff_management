<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChamCongThang extends Model
{
    use SoftDeletes;
    protected $table = 'cham_cong_thang';
    protected $fillable = ['Thang_Hien_Tai','So_Cong','Nghi_Le','Nghi_Phep','Nghi_Khong_Luong'];
}
