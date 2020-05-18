<?php

namespace App\Services\Impl;

use App\Repositories\NhanVienRepository;
use App\Services\NhanVienService;

class NhanVienServiceImpl implements NhanVienService
{
    protected $dataRepository;

    public function __construct(NhanVienRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function getAll()
    {
        $objects = $this->dataRepository->getAll();

        return $objects;
    }

    public function findById($id)
    {
        $object = $this->dataRepository->findById($id);

        $statusCode = 200;
        if (!$object)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'data' => $object
        ];

        return $data;
    }

    public function create($request)
    {
        $object = $this->dataRepository->create($request);

        $statusCode = 201;
        if (!$object)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'data' => $object
        ];

        return $data;
    }

    public function update($request, $id, $hash)
    {
        $oldData = $this->dataRepository->findHashId($id, $hash);

        if (!$oldData) {
            $newData = null;
            $statusCode = 404;
        } else {
            $newData = $this->dataRepository->update($request, $oldData);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'data' => $newData
        ];
        return $data;
    }

    public function destroy($id)
    {
        $object = $this->dataRepository->findById($id);

        $statusCode = 404;
        $message = "Not found";
        if ($object) {
            $this->dataRepository->destroy($object);
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
        $objects = $this->dataRepository->getSoftDeletes();

        return $objects;
    }

    public function restore($id)
    {
        $object = $this->dataRepository->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "Not found";
        if ($object) {
            $this->dataRepository->restore($object);
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
        $object = $this->dataRepository->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "Not found";
        if ($object) {
            $this->dataRepository->delete($object);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function findOnlyTrashed($id)
    {
        $object = $this->dataRepository->findOnlyTrashed($id);

        $statusCode = 200;
        if (!$object)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'data' => $object
        ];

        return $data;
    }

    public function findWithTrashed($id)
    {
        $object = $this->dataRepository->findWithTrashed($id);

        $statusCode = 200;
        if (!$object)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'data' => $object
        ];

        return $data;
    }

    public function findHashId($id, $hash)
    {
        $object = $this->dataRepository->findHashId($id, $hash);

        $statusCode = 200;
        if (!$object)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'data' => $object
        ];

        return $data;
    }
}