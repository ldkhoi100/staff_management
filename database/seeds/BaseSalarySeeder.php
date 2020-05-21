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
        $lcb = BaseSalary::create(['Tien_Luong'=>5000000,'Mo_Ta'=>"From to"]);
        $workshift1 =WorkShift::create(['Ca'=>1, 'Mo_Ta'=>'Morning 7h-12h']);
        $workshift2 =WorkShift::create(['Ca'=>2, 'Mo_Ta'=>'Afternoon 12h-17h']);
        $workshift3 =WorkShift::create(['Ca'=>3, 'Mo_Ta'=>'Evevning 17h-22h']);
        $use = User::create(['hash'=>112312314,'username'=> 'hien', 'password'=>bcrypt(12345678),'email'=>'email@email.com']);
    }
}
