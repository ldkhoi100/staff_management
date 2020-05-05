<?php

namespace App\Services\Impl;

use App\Repositories\BacLuongRepository;
use App\Services\BacLuongService;

class BacLuongServiceImpl implements BacLuongService
{
    protected $bac_luong_Repository;

    public function __construct(BacLuongRepository $bac_luong_Repository)
    {
        $this->bac_luong_Repository = $bac_luong_Repository;
    }

    public function getAll()
    {
        $bac_luong = $this->bac_luong_Repository->getAll();
        return $bac_luong;
    }

    public function findById($id)
    {
        $bac_luong = $this->bac_luong_Repository->findById($id);

        $statusCode = 200;
        if (!$bac_luong)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'bac_luong' => $bac_luong
        ];

        return $data;
    }

    public function create($request)
    {
        $bac_luong = $this->bac_luong_Repository->create($request);

        $statusCode = 201;
        if (!$bac_luong)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'bac_luong' => $bac_luong
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $bac_luong_cu = $this->bac_luong_Repository->findById($id);

        if (!$bac_luong_cu) {
            $bac_luong_moi = null;
            $statusCode = 404;
        } else {
            $bac_luong_moi = $this->bac_luong_Repository->update($request, $bac_luong_cu);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'bac_luong' => $bac_luong_moi
        ];

        return $data;
    }

    public function destroy($id)
    {
        $bac_luong = $this->bac_luong_Repository->findById($id);

        $statusCode = 404;
        $message = "bac_luong not found";
        if ($bac_luong) {
            $this->bac_luong_Repository->destroy($bac_luong);
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
        $users = $this->bac_luong_Repository->getSoftDeletes();

        return $users;
    }

    public function restore($id)
    {
        $bac_luong = $this->bac_luong_Repository->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "bac_luong not found";
        if ($bac_luong) {
            $this->bac_luong_Repository->restore($bac_luong);
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
        $bac_luong = $this->bac_luong_Repository->findById($id);

        $statusCode = 404;
        $message = "bac_luong not found";

        if ($bac_luong) {
            $this->bac_luong_Repository->delete($bac_luong);
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