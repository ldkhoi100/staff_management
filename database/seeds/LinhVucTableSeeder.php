<?php

use Illuminate\Database\Seeder;

class LinhVucTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('linh_vuc')->delete();

        \DB::table('linh_vuc')->insert(array (
            0 =>
            array (
                'Ten_LV' => 'Giám Đốc',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'Ten_LV' => 'Quản Lý',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'Ten_LV' => 'Pha Chế',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'Ten_LV' => 'Phục Vụ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
