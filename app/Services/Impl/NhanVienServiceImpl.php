<?php

namespace App\Services\Impl;

use App\Repositories\NhanVienRepository;
use App\Services\NhanVienService;

class NhanVienServiceImpl implements NhanViengService
{
    protected $nhan_vien_Repository;

    public function __construct(NhanVienRepository $nhan_vien_Repository)
    {
        $this->nhan_vien_Repository = $nhan_vien_Repository;
    }

    public function getAll()
    {
        $nhan_vien = $this->nhan_vien_Repository->getAll();
        return $nhan_vien;
    }

    public function findById($id)
    {
        $nhan_vien = $this->nhan_vien_Repository->findById($id);

        $statusCode = 200;
        if (!$nhan_vien)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'nhan_vien' => $nhan_vien
        ];

        return $data;
    }

    public function create($request)
    {
        $nhan_vien = $this->nhan_vien_Repository->create($request);

        $statusCode = 201;
        if (!$nhan_vien)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'nhan_vien' => $nhan_vien
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $nhan_vien_cu = $this->nhan_vien_Repository->findById($id);

        if (!$nhan_vien_cu) {
            $nhan_vien_moi = null;
            $statusCode = 404;
        } else {
            $nhan_vien_moi = $this->nhan_vien_Repository->update($request, $nhan_vien_cu);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'nhan_vien' => $nhan_vien_moi
        ];

        return $data;
    }

    public function destroy($id)
    {
        $nhan_vien = $this->nhan_vien_Repository->findById($id);

        $statusCode = 404;
        $message = "nhan_vien not found";
        if ($nhan_vien) {
            $this->nhan_vien_Repository->destroy($nhan_vien);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function getSoftDeletes()
    {
        $users = $this->nhan_vien_Repository->getSoftDeletes();

        return $users;
    }

    public function restore($id)
    {
        $nhan_vien = $this->nhan_vien_Repository->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "Nhan Vien not found";
        if ($nhan_vien) {
            $this->nhan_vien_Repository->restore($nhan_vien);
            $statusCode = 200;
            $message = "Restore success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function delete($id)
    {
        $nhan_vien = $this->nhan_vien_Repository->findById($id);

        $statusCode = 404;
        $message = "Nhan Vien not found";

        if ($nhan_vien) {
            $this->nhan_vien_Repository->delete($nhan_vien);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}