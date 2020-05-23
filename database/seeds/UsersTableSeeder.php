<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
            0 =>
            array(
                'hash' => 1231231231,
                'name' => NULL,
                'email' => 'ldkhoi100@gmail.com',
                'username' => 'admin',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/7Zjh9doQ3k0iwLautL1Ruw86IgFuL4yAGpXZeUI/Km3tsppP/TE.',
                'block' => 0,
                'remember_token' => NULL,
                'created_at' => '2020-05-14 15:59:46',
                'updated_at' => '2020-05-14 22:18:37',
                'deleted_at' => NULL,
            ),
        ));
    }
}