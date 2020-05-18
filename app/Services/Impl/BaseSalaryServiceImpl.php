<?php

namespace App\Services\Impl;

use App\Repositories\BaseSalaryRepository;
use App\Services\BaseSalaryService;

class BaseSalaryServiceImpl implements BaseSalaryService
{
    protected $baseSalaryRepository;

    public function __construct(BaseSalaryRepository $baseSalaryRepository)
    {
        $this->baseSalaryRepository = $baseSalaryRepository;
    }

    public function getAll()
    {
        $baseSalary = $this->baseSalaryRepository->getAll();

        return $baseSalary;
    }

    public function findById($id)
    {
        $baseSalary = $this->baseSalaryRepository->findById($id);

        $status = 200;
        if (!$baseSalary)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $baseSalary
        ];

        return $data;
    }

    public function create($request)
    {
        $baseSalary = $this->baseSalaryRepository->create($request);

        $status = 201;
        if (!$baseSalary)
            $status = 500;

        $data = [
            'status' => $status,
            'data' => $baseSalary
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $baseSalary = $this->baseSalaryRepository->findById($id);

        if (!$baseSalary) {
            $newbaseSalary = null;
            $status = 404;
        } else {
            $newbaseSalary = $this->baseSalaryRepository->update($request, $baseSalary);
            $status = 200;
        }

        $data = [
            'status' => $status,
            'data' => $newbaseSalary
        ];

        return $data;
    }

    public function destroy($id)
    {
        $baseSalary = $this->baseSalaryRepository->findById($id);

        $status = 404;
        $msg = "This factor salary not found";
        if ($baseSalary) {
            $this->baseSalaryRepository->destroy($baseSalary);
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
        $baseSalarytrash = $this->baseSalaryRepository->getSoftDeletes();

        return $baseSalarytrash;
    }

    public function findOnlyTrashed($id)
    {
        $baseSalary = $this->baseSalaryRepository->findOnlyTrashed($id);
        $status = 200;

        if (!$baseSalary)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $baseSalary
        ];

        return $data;
    }

    public function restore($id)
    {
        $baseSalary = $this->baseSalaryRepository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This factor salary not found";
        if ($baseSalary) {
            $this->baseSalaryRepository->restore($baseSalary);
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
        $baseSalary = $this->baseSalaryRepository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This factor salary not found";

        if ($baseSalary) {
            $this->baseSalaryRepository->delete($baseSalary);
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
