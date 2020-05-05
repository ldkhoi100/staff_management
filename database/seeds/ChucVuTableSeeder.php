<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('chuc_vu')->delete();

        DB::table('chuc_vu')->insert(array(
            0 =>
            array(
                'Ten_CV' => 'Giám Đốc',
                'Cong_Viec' => 'Ngồi chơi xơi nước',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'Ten_CV' => 'Quản Lý',
                'Cong_Viec' => 'Quản lý nhân viên',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'Ten_CV' => 'Pha Chế',
                'Cong_Viec' => 'Pha chế đồ uống',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'Ten_CV' => 'Phục Vụ',
                'Cong_Viec' => 'Bồi bàn, dọn dẹp',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
