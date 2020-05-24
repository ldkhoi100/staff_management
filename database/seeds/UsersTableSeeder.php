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
            1 =>
            array(
                'hash' => 1845178352,
                'name' => NULL,
                'email' => 'xudif@mailinator.com',
                'username' => 'wagocup',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/7Zjh9doQ3k0iwLautL1Ruw86IgFuL4yAGpXZeUI/Km3tsppP/TE.',
                'block' => 0,
                'remember_token' => NULL,
                'created_at' => '2020-05-24 22:15:26',
                'updated_at' => '2020-05-24 22:15:26',
                'deleted_at' => NULL,
            ),
            2 =>
            array(
                'hash' => 1365715922,
                'name' => NULL,
                'email' => 'hanecyv@mailinator.net',
                'username' => 'komuruwej',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/7Zjh9doQ3k0iwLautL1Ruw86IgFuL4yAGpXZeUI/Km3tsppP/TE.',
                'block' => 0,
                'remember_token' => NULL,
                'created_at' => '2020-05-24 22:15:35',
                'updated_at' => '2020-05-24 22:15:35',
                'deleted_at' => NULL,
            ),
            3 =>
            array(
                'hash' => 1882952630,
                'name' => NULL,
                'email' => 'pasa@mailinator.net',
                'username' => 'najukaqu',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/7Zjh9doQ3k0iwLautL1Ruw86IgFuL4yAGpXZeUI/Km3tsppP/TE.',
                'block' => 0,
                'remember_token' => NULL,
                'created_at' => '2020-05-24 22:15:43',
                'updated_at' => '2020-05-24 22:15:43',
                'deleted_at' => NULL,
            ),
            4 =>
            array(
                'hash' => 1356596941,
                'name' => NULL,
                'email' => 'xytonos@mailinator.net',
                'username' => 'wovige',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/7Zjh9doQ3k0iwLautL1Ruw86IgFuL4yAGpXZeUI/Km3tsppP/TE.',
                'block' => 0,
                'remember_token' => NULL,
                'created_at' => '2020-05-24 22:15:53',
                'updated_at' => '2020-05-24 22:15:53',
                'deleted_at' => NULL,
            ),
            5 =>
            array(
                'hash' => 1556528438,
                'name' => NULL,
                'email' => 'fyxiqyno@mailinator.net',
                'username' => 'huzugymoh',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/7Zjh9doQ3k0iwLautL1Ruw86IgFuL4yAGpXZeUI/Km3tsppP/TE.',
                'block' => 0,
                'remember_token' => NULL,
                'created_at' => '2020-05-24 22:16:16',
                'updated_at' => '2020-05-24 22:16:16',
                'deleted_at' => NULL,
            ),
        ));
    }
}