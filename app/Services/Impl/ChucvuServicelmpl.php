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
        $data = $this->chuc_vu_Repository->getAll();

        return $data;
    }

    public function findById($id)
    {
        $data = $this->chuc_vu_Repository->findById($id);

        $status = 200;
        if (!$data)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $data
        ];

        return $data;
    }

    public function create($request)
    {
        $data = $this->chuc_vu_Repository->create($request);

        $status = 201;
        if (!$data)
            $status = 500;

        $data = [
            'status' => $status,
            'data' => $data
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $cu_chuc_vu = $this->chuc_vu_Repository->findById($id);

        if (!$cu_chuc_vu) {
            $moi_chuc_vu = null;
            $status = 404;
        } else {
            $moi_chuc_vu = $this->chuc_vu_Repository->update($request, $cu_chuc_vu);
            $status = 200;
        }

        $data = [
            'status' => $status,
            'data' => $moi_chuc_vu
        ];
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->chuc_vu_Repository->findById($id);

        $status = 404;
        $msg = "Khong tim thay nguoi dung";
        if ($data) {
            $this->chuc_vu_Repository->destroy($data);
            $status = 200;
            $msg = "Xoa thanh cong!";
        }

        $data = [
            'status' => $status,
            'msg' => $msg
        ];
        return $data;
    }

    public function getSoftDeletes()
    {
        $chuvu = $this->chuc_vu_Repository->getSoftDeletes();

        return $chuvu;
    }

    public function findOnlyTrashed($id)
    {
        $chucvu = $this->chuc_vu_Repository->findOnlyTrashed($id);
        $status = 200;

        if (!$chucvu)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $chucvu
        ];

        return $data;
    }

    public function restore($id)
    {
        $chucvu = $this->chuc_vu_Repository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This factor salary not found";
        if ($chucvu) {
            $this->chuc_vu_Repository->restore($chucvu);
            $status = 200;
            $msg = "Restore success!";
        }

        $data = [
            'status' => $status,
            'msg' => $msg
        ];
        return $data;
    }

    public function delete($id)
    {
        $chucvu = $this->chuc_vu_Repository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This factor salary not found";

        if ($chucvu) {
            $this->chuc_vu_Repository->delete($chucvu);
            $status = 200;
            $msg = "Delete success!";
        }

        $data = [
            'status' => $status,
            'msg' => $msg
        ];
        return $data;
    }
}