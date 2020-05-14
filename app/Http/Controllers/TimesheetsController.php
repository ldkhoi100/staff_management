<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChamCongThangService;

class TimesheetsController extends Controller
{
    protected $timesheets_Service;

    public function __construct(ChamCongThangService $timesheets_Service)
    {
        $this->timesheets_Service = $timesheets_Service;
    }

    public function index()
    {
        $timesheets = $this->timesheets_Service->getAll();

        return response()->json($timesheets, 200);
    }

    public function create(Request $request)
    {
        $timesheets = $this->timesheets_Service->create($request->all());

        return response()->json($timesheets['Timekeeping_month'], $timesheets['statusCode']);

//        return view('Role.create');
    }
    public function getSoftDeletes(){
        $timesheets = $this->timesheets_Service->getSoftDeletes();

        return response()->json($timesheets, 200);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $timesheets = $this->timesheets_Service->create($data);

        return response()->json($timesheets['Timekeeping_month'], $timesheets['statusCode']);
    }

    public function show($id)
    {
        $timesheets = $this->timesheets_Service->findById($id);

        return response()->json($timesheets['Timekeeping_month'], $timesheets['statusCode']);
    }


    public function edit($id)
    {
        $timesheets = $this->timesheets_Service->findById($id);

        return response()->json($timesheets['Timekeeping_month'], $timesheets['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $timesheets = $this->timesheets_Service->update($request->all(), $id);

        return response()->json($timesheets['Timekeeping_month'], $timesheets['statusCode']);
    }


    public function destroy($id)
    {
        $timesheets = $this->timesheets_Service->destroy($id);

        return response()->json($timesheets['message'], $timesheets['statusCode']);
    }

    public function restore($id)
    {
        $timesheets = $this->timesheets_Service->restore($id);

        return response()->json($timesheets['message'], $timesheets['statusCode']);
    }

    public function delete($id)
    {
        $timesheets = $this->timesheets_Service->delete($id);

        return response()->json($timesheets['message'], $timesheets['statusCode']);
    }



}
