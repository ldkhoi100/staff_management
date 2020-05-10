<?php

namespace App\Services\Impl;

use App\Repositories\BacLuongRepository;
use App\Services\BacLuongService;

class BacLuongServiceImpl implements BacLuongService
{
    protected $factorSalaryRepository;

    public function __construct(BacLuongRepository $factorSalaryRepository)
    {
        $this->factorSalaryRepository = $factorSalaryRepository;
    }

    public function getAll()
    {
        $factorsalaries = $this->factorSalaryRepository->getAll();
        
        return $factorsalaries;
    }

    public function findById($id)
    {
        $factorsalary = $this->factorSalaryRepository->findById($id);

        $status = 200;
        if (!$factorsalary)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $factorsalary
        ];

        return $data;
    }

    public function create($request)
    {
        $factorsalary = $this->factorSalaryRepository->create($request);

        $status = 201;
        if (!$factorsalary)
            $status = 500;

        $data = [
            'status' => $status,
            'data' => $factorsalary
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $factorsalary = $this->factorSalaryRepository->findById($id);

        if (!$factorsalary) {
            $newfactorsalary = null;
            $status = 404;
        } else {
            $newfactorsalary = $this->factorSalaryRepository->update($request, $factorsalary);
            $status = 200;
        }

        $data = [
            'status' => $status,
            'data' => $newfactorsalary
        ];

        return $data;
    }

    public function destroy($id)
    {
        $factorsalary = $this->factorSalaryRepository->findById($id);

        $status = 404;
        $msg = "This factor salary not found";
        if ($factorsalary) {
            $this->factorSalaryRepository->destroy($factorsalary);
            $status = 200;
            $msg = "Move to trash success!";
        }

        $data = [
            'status' => $status,
            'msg' => $msg
        ];
        return $data;
    }

    public function getSoftDeletes()
    {
        $factorsalariestrash = $this->factorSalaryRepository->getSoftDeletes();

        return $factorsalariestrash;
    }

    public function findOnlyTrashed($id)
    {
        $factorsalary = $this->factorSalaryRepository->findOnlyTrashed($id);
        $status = 200;

        if (!$factorsalary)
            $status = 404;
            
        $data = [
            'status' => $status,
            'data' => $factorsalary
        ];

        return $data;
    }

    public function restore($id)
    {
        $factorsalary = $this->factorSalaryRepository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This factor salary not found";
        if ($factorsalary) {
            $this->factorSalaryRepository->restore($factorsalary);
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
        $factorsalary = $this->factorSalaryRepository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This factor salary not found";

        if ($factorsalary) {
            $this->factorSalaryRepository->delete($factorsalary);
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
