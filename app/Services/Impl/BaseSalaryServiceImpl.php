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

    public function get()
    {
        $baseSalary = $this->baseSalaryRepository->getAll()->first();

        return $baseSalary;
    }

    public function update($request)
    {
        $oldBaseSalary = $this->baseSalaryRepository->getAll()->first();

        if (!$oldBaseSalary) {
            $newBaseSalary = null;
            $status = 404;
        } else {
            $newBaseSalary = $this->baseSalaryRepository->update($request, $oldBaseSalary);
            $status = 200;
        }

        $data = [
            'status' => $status,
            'data' => $newBaseSalary
        ];

        return $data;
    }
}
