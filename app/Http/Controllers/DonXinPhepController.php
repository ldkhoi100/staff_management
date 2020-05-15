<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonxinphepRequest;
use Illuminate\Http\Request;
use App\Services\DonXinPhepService;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyMail;
class DonXinPhepController extends Controller
{
    protected $donxinphepService;

    public function __construct(DonXinPhepService $donxinphepService)
    {
        // $this->middleware('auth');
        // $this->middleware('role:admin|superAdmin')->except(['create', 'delete','restore', 'moveToTrash']);
        // $this->middleware('role:superAdmin')->only(['create', 'delete','restore', 'moveToTrash']);
        // $this->middleware('AjaxRequest')->except('index');
        $this->donxinphepService = $donxinphepService;
    }

    public function index()
    {
        return view('donxinphep.index');
    }

    public function getAll()
    {
        $factorSalaries = $this->donxinphepService->getAll()->toArray();
        return response()->json($factorSalaries);
    }

    public function findById($id)
    {
        $donxinphep = $this->donxinphepService->findById($id);

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function create(DonxinphepRequest $request)
    {
        $donxinphep = $this->donxinphepService->create($request->all());

        // Mail::to("ldkhoi100@gmail.com")->send(new ReplyMail($donxinphep, $request->NoiDung));

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function update(DonxinphepRequest $request, $id)
    {
        $donxinphep = $this->donxinphepService->update($request->all(), $id);

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }


    public function moveToTrash($id)
    {
        $donxinphep = $this->donxinphepService->destroy($id);

        return response()->json($donxinphep['msg'], $donxinphep['status']);
    }

    public function getTrash()
    {
        $factorSalaries = $this->donxinphepService->getSoftDeletes();

        return response()->json($factorSalaries);
    }

    public function findTrashById($id)
    {
        $donxinphep = $this->donxinphepService->findOnlyTrashed($id);

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function restore($id)
    {
        $donxinphep = $this->donxinphepService->restore($id);

        return response()->json($donxinphep['msg'], $donxinphep['status']);
    }

    public function delete($id)
    {
        $donxinphep = $this->donxinphepService->delete($id);

        return response()->json($donxinphep['msg'], $donxinphep['status']);
    }

}


