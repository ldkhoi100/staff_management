<?php

namespace App\Services\Impl;

use App\Repositories\CongthangRepository;
use App\Services\ChamCongThangService;


class ChamCongThangServiceImpl implements ChamCongThangService
{
    protected $Chamcongthang;

    public function __construct(CongthangRepository $Chamcongthang)
    {
        $this->Chamcongthang = $Chamcongthang;
    }

    public function getAll()
    {
        $Timekeeping_month = $this->Chamcongthang->getAll();
        return $Timekeeping_month;
    }

    public function findById($id)
    {
        $Timekeeping_month = $this->Chamcongthang->findById($id);

        $statusCode = 200;
        if (!$Timekeeping_month)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'Timekeeping_month' => $Timekeeping_month
        ];
        return $data;
    }

    public function create($request)
    {
        $Timekeeping_month = $this->Chamcongthang->create($request);
        $statusCode = 201;
        if (!$Timekeeping_month)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'Timekeeping_month' => $Timekeeping_month
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $Timekeeping_month = $this->Chamcongthang->findById($id);

        if (!$Timekeeping_month) {
            $new_timekeeping = null;
            $statusCode = 404;
        } else {
            $new_timekeeping = $this->Chamcongthang->update($request, $Timekeeping_month);
             $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'Timekeeping_month' => $new_timekeeping
        ];
        return $data;
    }

    public function destroy($id)
    {
        $Timekeeping_month = $this->Chamcongthang->findById($id);

        $statusCode = 404;
        $message = 'User not found';
        if ($Timekeeping_month) {
            $this->Chamcongthang->destroy($Timekeeping_month);
            $statusCode = 200;
            $message = 'Delete success!';
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function getSoftDeletes()
    {
        $Timekeeping_month = $this->Chamcongthang->getSoftDeletes();

        return $Timekeeping_month;
    }

    public function restore($id)
    {
        $Timekeeping_month = $this->Chamcongthang->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "Timekeeping_month not found";
        if ($Timekeeping_month){
            $this->Chamcongthang->restore($Timekeeping_month);
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
        $Timekeeping_month = $this->Chamcongthang->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "Timekeeping_month not found";

        if ($Timekeeping_month){
            $this->Chamcongthang->delete($Timekeeping_month);
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
