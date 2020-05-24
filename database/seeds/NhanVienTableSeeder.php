<?php

use Illuminate\Database\Seeder;

class NhanVienTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('nhan_vien')->delete();

        \DB::table('nhan_vien')->insert(array(
            0 =>
            array(
                'id' => 2,
                'hash' => 1868209685,
                'MaCV' => 4,
                'Anh_Dai_Dien' => 'AaYl2_1.jpg',
                'Ho_Ten' => 'Repudiandae ex volup',
                'Ngay_Sinh' => '1991-01-22',
                'Gioi_Tinh' => 'Male',
                'So_Dien_Thoai' => 36,
                'Dia_Chi' => 'Ullam dicta in volup',
                'Ca_Lam' => 3,
                'Ngay_Bat_Dau_Lam' => '2000-11-26',
                'Ngay_Nghi_Viec' => NULL,
                'created_at' => '2020-05-24 22:15:26',
                'updated_at' => '2020-05-24 22:15:26',
                'deleted_at' => NULL,
            ),
            1 =>
            array(
                'id' => 3,
                'hash' => 1354083260,
                'MaCV' => 4,
                'Anh_Dai_Dien' => '3N77B_bf3538ade7311d23eff28001ed73f678.jpg',
                'Ho_Ten' => 'Omnis dignissimos qu',
                'Ngay_Sinh' => '1974-12-24',
                'Gioi_Tinh' => 'Male',
                'So_Dien_Thoai' => 39,
                'Dia_Chi' => 'Aut consequatur A i',
                'Ca_Lam' => 7,
                'Ngay_Bat_Dau_Lam' => '2019-03-23',
                'Ngay_Nghi_Viec' => NULL,
                'created_at' => '2020-05-24 22:15:35',
                'updated_at' => '2020-05-24 22:15:35',
                'deleted_at' => NULL,
            ),
            2 =>
            array(
                'id' => 4,
                'hash' => 1868268757,
                'MaCV' => 3,
                'Anh_Dai_Dien' => 'RH59a_close-up-portrait-of-lion-247502.jpg',
                'Ho_Ten' => 'Assumenda laudantium',
                'Ngay_Sinh' => '2000-03-21',
                'Gioi_Tinh' => 'Male',
                'So_Dien_Thoai' => 89,
                'Dia_Chi' => 'Ut id exercitationem',
                'Ca_Lam' => 5,
                'Ngay_Bat_Dau_Lam' => '1974-01-05',
                'Ngay_Nghi_Viec' => NULL,
                'created_at' => '2020-05-24 22:15:43',
                'updated_at' => '2020-05-24 22:15:43',
                'deleted_at' => NULL,
            ),
            3 =>
            array(
                'id' => 5,
                'hash' => 1578320792,
                'MaCV' => 4,
                'Anh_Dai_Dien' => 'VuNog_avatar1.jpg',
                'Ho_Ten' => 'Doloremque voluptati',
                'Ngay_Sinh' => '1993-10-08',
                'Gioi_Tinh' => 'Male',
                'So_Dien_Thoai' => 17,
                'Dia_Chi' => 'Ut quis voluptatem m',
                'Ca_Lam' => 6,
                'Ngay_Bat_Dau_Lam' => '2006-04-02',
                'Ngay_Nghi_Viec' => NULL,
                'created_at' => '2020-05-24 22:15:53',
                'updated_at' => '2020-05-24 22:15:53',
                'deleted_at' => NULL,
            ),
            4 =>
            array(
                'id' => 6,
                'hash' => 1106953293,
                'MaCV' => 2,
                'Anh_Dai_Dien' => 'nwbEn_1.jpg',
                'Ho_Ten' => 'Modi aut nostrum min',
                'Ngay_Sinh' => '2010-02-22',
                'Gioi_Tinh' => 'Male',
                'So_Dien_Thoai' => 26,
                'Dia_Chi' => 'Dolore quo optio te',
                'Ca_Lam' => 4,
                'Ngay_Bat_Dau_Lam' => '1992-09-06',
                'Ngay_Nghi_Viec' => NULL,
                'created_at' => '2020-05-24 22:16:16',
                'updated_at' => '2020-05-24 22:16:16',
                'deleted_at' => NULL,
            ),
        ));
    }
}