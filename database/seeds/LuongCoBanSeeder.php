<?php

use App\Model\LuongCoBan;
use Illuminate\Database\Seeder;

class LuongCoBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lcb = LuongCoBan::create(['Tien_Luong'=>5000000]);
    }
}
