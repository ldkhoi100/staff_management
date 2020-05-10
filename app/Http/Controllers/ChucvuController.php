<?php

namespace App\Http\Controllers;

use App\Services\ChucvuService;
use Illuminate\Http\Request;

class ChucvuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $chucvu_Service;


    public function __construct(ChucvuService $chucvu_Service)
    {
        $this->chucvu_Service = $chucvu_Service;
    }

    public function index()
    {

        $chuc_vu = $this->chucvu_Service->getAll();

         return view('Chuc_vu.dataTable',compact('chuc_vu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Chuc_vu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data_Chucvu = $this->chucvu_Service->create($request->all());

        // return response()->json('', $data_Chucvu['statusCode']);
        return response()->json($data_Chucvu['chucvu'], $data_Chucvu['statusCode']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_Chucvu = $this->chucvu_Service->findById($id);
        return response()->json($data_Chucvu['chucvu'], $data_Chucvu['statusCode']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_Chucvu = $this->chucvu_Service->update($request->all(), $id);

        return response()->json($data_Chucvu['chucvu'], $data_Chucvu['statusCode']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_Chucvu = $this->chucvu_Service->destroy($id);

        return response()->json($data_Chucvu['message'], $data_Chucvu['statusCode']);
    }
}
