<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseSalary extends Model
{
    use SoftDeletes;

    protected $table = 'luong_co_ban';
    protected $fillable = ['Tien_Luong', 'Mo_Ta'];

    public function chamcong()
    {
        return $this->hasMany(TimeSheets::class, 'LuongCB', 'id');
    }
}