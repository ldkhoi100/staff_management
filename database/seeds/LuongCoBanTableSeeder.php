<?php

use Illuminate\Database\Seeder;

class LuongCoBanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('luong_co_ban')->delete();

        \DB::table('luong_co_ban')->insert(array(
            0 =>
            array(
                'Tien_Luong' => 40000,
                'Mo_Ta' => '40000 each shift',
                'created_at' => '2020-05-17 00:00:00',
                'updated_at' => '2020-05-18 09:02:28',
                'deleted_at' => NULL,
            ),
            1 =>
            array(
                'Tien_Luong' => 50000,
                'Mo_Ta' => '50000 each shift',
                'created_at' => '2020-05-18 08:47:01',
                'updated_at' => '2020-05-18 09:02:14',
                'deleted_at' => NULL,
            ),
        ));
    }
}