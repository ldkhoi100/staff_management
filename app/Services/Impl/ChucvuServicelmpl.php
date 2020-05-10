<?php
namespace App\Services\Impl;

use App\Repositories\ChucvuRepository;
use App\Services\ChucvuService;

class ChucvuServiceImpl implements ChucvuService
{
    protected $chuc_vu_Repository;


    public function __construct(ChucvuRepository $chuc_vu_Repository)
    {
        $this->chuc_vu_Repository = $chuc_vu_Repository;
    }

    public function getAll()
    {
        $chuc_vu = $this->chuc_vu_Repository->getAll();

        return  $chuc_vu;
    }

    public function findById($id)
    {
        $chuc_vu = $this->chuc_vu_Repository->findById($id);

        $statusCode = 200;
        if (!$chuc_vu)
            $statusCode = 404;

            $data = [
                'statusCode' => $statusCode,
                'chuc_vu' => $chuc_vu
            ];

        return $data;
    }

    public function create($request)
    {
        $chuc_vu = $this->chuc_vu_Repository->create($request);

        $statusCode = 201;
        if (!$chuc_vu)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'chuc_vu' => $chuc_vu
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $cu_chuc_vu = $this->chuc_vu_Repository->findById($id);

        if (!$cu_chuc_vu) {
            $moi_chuc_vu = null;
            $statusCode = 404;
        } else {
            $moi_chuc_vu = $this->customerRepository->update($request, $cu_chuc_vu);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'chuc_vu' => $moi_chuc_vu
        ];
        return $data;
    }

    public function destroy($id)
    {
        $chuc_vu = $this->chuc_vu_Repository->findById($id);

        $statusCode = 404;
        $message = "Khong tim thay nguoi dung";
        if ($chuc_vu) {
            $this->chuc_vu_Repository->destroy($chuc_vu);
            $statusCode = 200;
            $message = "Xoa thanh cong!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
