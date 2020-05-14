<?php

namespace App\Services\Impl;

use App\Repositories\LuongCoBanRepository;
use App\Services\LuongCoBanService;

class LuongCoBanServiceImpl implements LuongCoBanService
{
    protected $luongCoBanRepository;

    public function __construct(LuongCoBanRepository $luongCoBanRepository)
    {
        $this->luongCoBanRepository = $luongCoBanRepository;
    }

    public function get()
    {
        $luongcoban = $this->luongCoBanRepository->getAll()->first();

        return $luongcoban;
    }

    public function update($request)
    {
        $luongcoban = $this->luongCoBanRepository->getAll()->first();

        if (!$luongcoban) {
            $newLuongcb = null;
            $status = 404;
        } else {
            $newLuongcb = $this->luongCoBanRepository->update($request, $luongcoban);
            $status = 200;
        }

        $data = [
            'status' => $status,
            'data' => $newLuongcb
        ];

        return $data;
    }
}
