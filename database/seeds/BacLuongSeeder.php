<?php

use App\Model\BacLuong;
use App\Model\LuongCoBan;
use Illuminate\Database\Seeder;

class BacLuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $luongcb = new LuongCoBan(['Tien_Luong' => 6000000]);
        $luongcb->save();

        factory(BacLuong::class, 5)->create();
    }
}
