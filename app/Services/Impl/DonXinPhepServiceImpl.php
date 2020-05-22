<?php

namespace App\Services\Impl;

use App\Repositories\DonXinPhepRepository;
use App\Services\DonXinPhepService;

class DonXinPhepServiceImpl implements DonXinPhepService
{
    protected $don_xin_phepRepository;


    public function __construct(DonXinPhepRepository $don_xin_phepRepository)
    {
        $this->don_xin_phepRepository = $don_xin_phepRepository;
    }

    public function getAll()
    {
        $data = $this->don_xin_phepRepository->getAll();

        return  $data;
    }

    public function findById($id)
    {
        $data = $this->don_xin_phepRepository->findById($id);

        $status = 200;
        if (!$data)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $data
        ];

        return $data;
    }

    public function findMaNV()
    {
        $data = $this->don_xin_phepRepository->findMaNV();

        return $data;
    }

    public function create($request)
    {
        $data = $this->don_xin_phepRepository->create($request);

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
        $old_don_xin_phep = $this->don_xin_phepRepository->findById($id);

        if (!$old_don_xin_phep) {
            $new_don_xin_phep = null;
            $status = 404;
        } else {
            $new_don_xin_phep = $this->don_xin_phepRepository->update($request, $old_don_xin_phep);
            $status = 200;
        }

        $data = [
            'status' => $status,
            'data' => $new_don_xin_phep
        ];
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->don_xin_phepRepository->findById($id);

        $status = 404;
        $msg = "Khong tim thay nguoi dung";
        if ($data) {
            $this->don_xin_phepRepository->destroy($data);
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
        $donxinphep = $this->don_xin_phepRepository->getSoftDeletes();

        return $donxinphep;
    }

    public function findOnlyTrashed($id)
    {
        $donxinphep = $this->don_xin_phepRepository->findOnlyTrashed($id);
        $status = 200;

        if (!$donxinphep)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $donxinphep
        ];

        return $data;
    }

    public function restore($id)
    {
        $donxinphep = $this->don_xin_phepRepository->findOnlyTrashed($id);
        // dd($donxinphep);

        $status = 404;
        $msg = "This factor salary not found";
        if ($donxinphep) {
            $this->don_xin_phepRepository->restore($donxinphep);
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
        $donxinphep = $this->chuc_vu_Repository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This factor salary not found";

        if ($donxinphep) {
            $this->chuc_vu_Repository->delete($donxinphep);
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