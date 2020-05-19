<?php

namespace App\Http\Controllers;

use App\Services\ChamCongNgayService;
use Illuminate\Http\Request;



class ChamcongngayController extends Controller
{
    protected $chamcongngay;

    public function __construct(ChamCongNgayService $chamcongngay)
    {
        $this->chamcongngay = $chamcongngay;
    }

    public function index()
    {
        $congngay = $this->chamcongngay->getAll();


//        return response()->json($congngay, 200);
        return view('chamcongngay.index',compact('congngay'));

    }
    public function getSoftDeletes(){
        $congngay = $this->chamcongngay->getSoftDeletes();

        return response()->json($congngay, 200);
    }

    public function create(Request $request)
    {
        $congngay = $this->chamcongngay->create($request->all());

        return response()->json($congngay['congngay'], $congngay['status']);


    }

    public function store(Request $request)
    {
//        dd($request->all());
        $data = $request->all();
        $congngay = $this->chamcongngay->create($data);

        return response()->json($congngay['congngay'], $congngay['statusCode']);
    }

    public function show($id)
    {
        $congngay = $this->chamcongngay->findById($id);

        return response()->json($congngay['congngay'], $congngay['statusCode']);
    }


    public function edit($id)
    {
        $congngay = $this->chamcongngay->findById($id);

        return response()->json($congngay['congngay'], $congngay['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $congngay = $this->chamcongngay->update($request->all(), $id);

        return response()->json($congngay['congngay'], $congngay['statusCode']);
    }


    public function destroy($id)
    {
        $congngay = $this->chamcongngay->destroy($id);

        return response()->json($congngay['message'], $congngay['statusCode']);
    }

    public function restore($id)
    {
        $congngay = $this->chamcongngay->restore($id);

        return response()->json($congngay['message'], $congngay['statusCode']);
    }

    public function delete($id)
    {
        $congngay = $this->chamcongngay->delete($id);

        return response()->json($congngay['message'], $congngay['statusCode']);
    }
}
