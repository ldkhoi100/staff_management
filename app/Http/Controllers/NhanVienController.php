<?php

namespace App\Http\Controllers;

use App\Services\NhanVienService;
use App\Services\ChucvuService;
use App\Services\FactorSalaryService;
use App\Services\UserService;
use Str;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Http\Requests\NhanVienCreateRequest;
use App\Http\Requests\NhanVienUpdateRequest;
use App\Model\ChucVu;
use App\Model\FactorSalary;
use App\Model\WorkShift;
use App\Services\WorkShiftService;

class NhanVienController extends Controller
{
    protected $staffService;
    protected $chucVuService;
    protected $heSoLuongService;
    protected $userService;

    public function __construct(NhanVienService $staffService, ChucvuService $chucVuService, WorkShiftService $workShiftService, UserService $userService)
    {
        $this->middleware('auth');
        $this->middleware('AjaxRequest')->except('index');
        $this->staffService = $staffService;
        $this->chucVuService = $chucVuService;
        $this->workShiftService = $workShiftService;
        $this->userService = $userService;
    }

    public function index()
    {
        $staffs = $this->staffService->getAll();

        return view('nhanvien.index', compact('staffs'));
    }

    public function indexAjax()
    {
        $staffs = $this->staffService->getAll();

        return view('nhanvien.ajax.list', compact('staffs'));
    }


    public function selectMaCV()
    {
        $maCV = $this->chucVuService->getAll();

        return response()->json($maCV, 200);
    }

    public function selectHSL()
    {
        $HSL = $this->workShiftService->getAll();

        return response()->json($HSL, 200);
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->staffService->findWithTrashed($id);
        $data['MaCV_name'] = (ChucVu::find($data['data']['MaCV'])->Ten_CV);
        $data['Ca_Lam_Name'] = (WorkShift::find($data['data']['Ca_Lam'])->Ca);
        $data['Username'] = (User::find($data['data']['id'])->username);
        return response()->json(['data' => $data], 200);
    }

    public function store(NhanVienCreateRequest $request)
    {
        $user_array = $this->userService->getAllUser()->pluck(['hash'])->toArray();
        $NV_array = $this->staffService->getAll()->pluck('hash')->toArray();

        $data = $request->only(['MaCV', 'Ca_Lam', 'Anh_Dai_Dien', 'Ho_Ten', 'Ngay_Sinh', 'Gioi_Tinh', 'So_Dien_Thoai', 'Dia_Chi', 'Ngay_Bat_Dau_Lam']);
        $user = $request->only(['username', 'email', 'password_confirmation']);
        $user['password'] = Hash::make($request->password);
        $user['hash'] = rand(1000000000, 2147483640);
        while (in_array($user['hash'], $user_array)) {
            $user['hash'] = rand(1000000000, 2147483640);
        }
        $users = $this->userService->createUser($user);


        $data['id'] = $users['data']->id;
        $data['hash'] = rand(1000000000, 2147483640);
        while (in_array($data['hash'], $NV_array)) {
            $data['hash'] = rand(1000000000, 2147483640);
        }

        if ($request->hasFile('Anh_Dai_Dien')) {
            $file = $request->file('Anh_Dai_Dien');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/", $image);
            $data['Anh_Dai_Dien'] = $image;
        }
        $create_data = $this->staffService->create($data);

        return response()->json($create_data['data'], $create_data['statusCode']);
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->staffService->findWithTrashed($id);

        return response()->json($data['data'], $data['statusCode']);
    }

    public function update(NhanVienUpdateRequest $request, $id)
    {
        $data_current = $this->staffService->findWithTrashed($id);
        $requestData = $request->all();
        if ($request->hasFile('Anh_Dai_Dien')) {
            $file = $request->file('Anh_Dai_Dien');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/", $image);
            if (!empty($data_current['data']->Anh_Dai_Dien)) {
                unlink("img/" . $data_current['data']->Anh_Dai_Dien);
            }
            $requestData['Anh_Dai_Dien'] = $image;
        }
        $data = $this->staffService->update($requestData, $id, $request->hash);

        if ($request->Ngay_Nghi_Viec != null) {
            $this->staffService->destroy($id);
        }

        return response()->json($data['data'], $data['statusCode']);
    }

    public function moveToTrash($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->staffService->destroy($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function getSoftDeletes()
    {
        $staffs = $this->staffService->getSoftDeletes();

        return view('nhanvien.ajax.trash', compact('staffs'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->staffService->restore($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->staffService->delete($id);

        return response()->json($data['message'], $data['statusCode']);
    }
}