<?php

use App\Model\BaseSalary;
use App\Model\WorkShift;
use App\User;
use Illuminate\Database\Seeder;

class BaseSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lcb = BaseSalary::create(['Tien_Luong'=>5000000]);
        $workshift1 =WorkShift::create(['Ca'=>1, 'He_So'=>1.10, 'Mo_Ta'=>'Morning 7h-12h']);
        $workshift2 =WorkShift::create(['Ca'=>2, 'He_So'=>1.00, 'Mo_Ta'=>'Afternoon 12h-17h']);
        $workshift3 =WorkShift::create(['Ca'=>3, 'He_So'=>1.30, 'Mo_Ta'=>'Evevning 17h-22h']);
        $use = User::create(['username'=> 'hien', 'password'=>bcrypt(12345678),'email'=>'email@email.com']);
    }
}
