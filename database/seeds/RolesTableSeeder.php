<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('roles')->delete();

        DB::table('roles')->insert(array(
            0 =>
            array(
                'name' => 'ROLE_USER',
                'description' => 'ROLE_USER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'name' => 'ROLE_ADMIN',
                'description' => 'ROLE_ADMIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'name' => 'ROLE_SUPERADMIN',
                'description' => 'ROLE_SUPERADMIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
