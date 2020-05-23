<?php

use Illuminate\Database\Seeder;

class ChucVuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('chuc_vu')->delete();

        \DB::table('chuc_vu')->insert(array(
            0 =>
            array(
                'Ten_CV' => 'Staff Manager',
                'Cong_Viec' => 'Quản lý nhân viên',
                'Bac_Luong' => 1.5,
                'created_at' => NULL,
                'updated_at' => '2020-05-22 14:33:31',
                'deleted_at' => NULL,
            ),
            1 =>
            array(
                'Ten_CV' => 'Bartender',
                'Cong_Viec' => 'Nhân viên pha chế/bếp',
                'Bac_Luong' => 1.2,
                'created_at' => '2020-05-15 20:38:25',
                'updated_at' => '2020-05-15 20:38:25',
                'deleted_at' => NULL,
            ),
            2 =>
            array(
                'Ten_CV' => 'Service Staff',
                'Cong_Viec' => 'Nhân viên phục vụ.',
                'Bac_Luong' => 1.0,
                'created_at' => '2020-05-15 20:38:47',
                'updated_at' => '2020-05-21 09:02:11',
                'deleted_at' => NULL,
            ),
            3 =>
            array(
                'Ten_CV' => 'Staff Parking',
                'Cong_Viec' => 'Nhân viên giữ xe',
                'Bac_Luong' => 1.0,
                'created_at' => '2020-05-22 00:00:00',
                'updated_at' => '2020-05-22 00:00:00',
                'deleted_at' => NULL,
            ),
            4 =>
            array(
                'Ten_CV' => 'Cashier',
                'Cong_Viec' => 'Nhân viên thu ngân',
                'Bac_Luong' => 1.2,
                'created_at' => '2020-05-22 00:00:00',
                'updated_at' => '2020-05-22 00:00:00',
                'deleted_at' => NULL,
            ),
        ));
    }
}