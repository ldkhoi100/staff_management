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
        App\User::create(['email' => 'ad@mi.n', 'username' => 'admin', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi']);
    }
}
