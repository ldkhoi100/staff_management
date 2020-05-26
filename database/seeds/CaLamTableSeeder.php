<?php

use Illuminate\Database\Seeder;

class CaLamTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('ca_lam')->delete();

        \DB::table('ca_lam')->insert(array(
            0 =>
            array(
                'Ca' => 1,
                'Gio_Lam' => '7h-12h',
                'Mo_Ta' => 'Morning Shift',
                'created_at' => NULL,
                'updated_at' => '2020-05-18 08:44:52',
                'deleted_at' => NULL,
            ),
            1 =>
            array(
                'Ca' => 2,
                'Gio_Lam' => '12h-17h',
                'Mo_Ta' => 'Afternoon Shift',
                'created_at' => '2020-05-18 08:34:35',
                'updated_at' => '2020-05-18 08:44:50',
                'deleted_at' => NULL,
            ),
            2 =>
            array(
                'Ca' => 3,
                'Gio_Lam' => '17h-22h',
                'Mo_Ta' => 'Evening Shift',
                'created_at' => '2020-05-18 08:34:36',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 =>
            array(
                'Ca' => 12,
                'Gio_Lam' => '7h-17h',
                'Mo_Ta' => 'Morning-Afternoon Shift',
                'created_at' => '2020-05-18 08:34:37',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 =>
            array(
                'Ca' => 13,
                'Gio_Lam' => '12h-22h',
                'Mo_Ta' => 'Afternoon-Evening Shift',
                'created_at' => '2020-05-18 08:34:38',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 =>
            array(
                'Ca' => 23,
                'Gio_Lam' => '7h-12h, 17h-22h',
                'Mo_Ta' => 'Morning-Evening Shift',
                'created_at' => '2020-05-18 08:34:39',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 =>
            array(
                'Ca' => 123,
                'Gio_Lam' => '7h-22h',
                'Mo_Ta' => 'Morning-Afternoon-Evening Shift',
                'created_at' => '2020-05-18 08:34:40',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
    }
}