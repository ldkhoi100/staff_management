<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ChucVu;
use Excel;
class ExcelController extends Controller
{
    function index()
    {
        $chucvus = ChucVu::all();
        return view('Chuc_vu.index1',compact('chucvus'));
    }

    function excel()
    {
     $chucvus = ChucVu::all()->toArray();
     $chucvu_array[] = array('Ten_CV','Cong_Viec','Bac_Luong');
     foreach($chucvus as $chucvu)
     {
      $chucvu_array[] = array(
       'Ten_CV'  => $chucvu->Ten_CV,
       'Cong_Viec'   => $chucvu->Cong_Viec,
       'Bac_Luong'    => $chucvu->Bac_Luong
      );
     }

     Excel::create('chucvus', function($excel) use ($chucvu_array){
      $excel->setTitle('chucvus');
      $excel->sheet('chucvus', function($sheet) use ($chucvu_array){
       $sheet->fromArray($chucvu_array, null, 'A1', true, true);
      });
     })->download('xlsx');
    }
}
