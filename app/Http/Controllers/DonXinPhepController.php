<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonxinphepRequest;
use Illuminate\Http\Request;
use App\Services\DonXinPhepService;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyMail;
use App\Model\NhanVien;
use App\Model\Role;
use App\User;
use Auth;
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

        // $users = Role::where('name', 'like','%ADMIN%')->get();
        // $arr=[];
        // foreach($users as $user){
        //     $arr = array_merge($arr,$user->users()->pluck('email')->toArray());
        //     Mail::to($user->email)->send(new ReplyMail($donxinphep, $request->NoiDung));
        // }
        // dd($arr);
        $factorSalaries = $this->donxinphepService->getAll()->toArray();

        foreach($factorSalaries as $key => $value){
            $factorSalaries[$key]['nhanvien_name'] = NhanVien::find($value['MaNV'])->Ho_Ten;
        }

        return response()->json($factorSalaries);
    }

    public function sendmail($email, $request, $noidung)
    {
        dd($request);
        // $users = Role::where('name', 'like','%ADMIN%')->get();
        // $arr = [];
        // foreach($users as $user){
        //     $arr = array_merge($user->users->pluck('email')->toArray());
            Mail::to($email)->send(new ReplyMail($request, $noidung));
        // }
        // dd($arr);

        // return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function findById($id)
    {
        $donxinphep = $this->donxinphepService->findById($id);

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function create(DonxinphepRequest $request)
    {
        $array = $request->all();
        $array['MaNV'] = Auth::id();

        $donxinphep = $this->donxinphepService->create($array);
        $users = User::all();
        foreach($users as $user){
            if ($user->roles[0]->name == "ROLE_ADMIN" || $user->roles[0]->name == "ROLE_SUPERADMIN") {
               $this->sendmail($user->email, $donxinphep, $request->NoiDung);
            }
        }

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


