<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LuongCoBan extends Model
{
    use SoftDeletes;

    protected $table = 'luong_co_ban';
    protected $fillable = ['Tien_Luong'];

    public function bacLuong()
    {
        return $this->hasMany(BacLuong::class, 'LuongCB');
    }
}
