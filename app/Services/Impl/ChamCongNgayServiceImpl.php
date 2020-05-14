<?php

namespace App\Services\Impl;

use App\Repositories\ChamCongNgayRepository;
use App\Services\ChamCongNgayService;

class ChamCongNgayServiceImpl implements ChamCongNgayService
{
    protected $chamcongngay;

    public function __construct(ChamCongNgayRepository $chamcongngay)
    {
        $this->chamcongngay = $chamcongngay;
    }

    public function getAll()
    {
        $congngay = $this->chamcongngay->getAll();
        return $congngay;
    }

    public function findById($id)
    {
        $congngay = $this->chamcongngay->findById($id);

        $statusCode = 200;
        if (!$congngay)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'congngay' => $congngay
        ];

        return $data;
    }
    public function create($request)
    {
        $congngay = $this->chamcongngay->create($request);

        $statusCode = 201;
        if (!$congngay)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'congngay' => $congngay
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $congngay = $this->chamcongngay->findById($id);

        if (!$congngay) {
            $newRole = null;
            $statusCode = 404;
        } else {
            $newRole = $this->chamcongngay->update($request, $congngay);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'congngay' => $congngay
        ];
        return $data;
    }

    public function destroy($id)
    {
        $congngay = $this->chamcongngay->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($congngay) {
            $this->chamcongngay->destroy($congngay);
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
        $congngay = $this->chamcongngay->getSoftDeletes();

        return $congngay;
    }

    public function restore($id)
    {
        $congngay = $this->chamcongngay->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "role not found";
        if ($congngay) {
            $this->chamcongngay->restore($congngay);
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
        $congngay = $this->chamcongngay->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "role not found";

        if ($congngay) {
            $this->chamcongngay->delete($congngay);
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
