<?php

namespace App\Services\Impl;

use App\Repositories\TimeSheetsRepository;
use App\Services\TimeSheetsService;

class TimeSheetsServiceImpl implements TimeSheetsService
{
    protected $timeSheetsRepository;

    public function __construct(TimeSheetsRepository $timeSheetsRepository)
    {
        $this->timeSheetsRepository = $timeSheetsRepository;
    }

    public function getAll()
    {
        $timeSheets = $this->timeSheetsRepository->getAll();

        return $timeSheets;
    }

    public function findById($id)
    {
        $timeSheets = $this->timeSheetsRepository->findById($id);

        $status = 200;
        if (!$timeSheets)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $timeSheets
        ];

        return $data;
    }

    public function create($request)
    {
        $timeSheets = $this->timeSheetsRepository->create($request);

        $status = 201;
        if (!$timeSheets)
            $status = 500;

        $data = [
            'status' => $status,
            'data' => $timeSheets
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $timeSheets = $this->timeSheetsRepository->findById($id);

        if (!$timeSheets) {
            $newtimeSheets = null;
            $status = 404;
        } else {
            $newtimeSheets = $this->timeSheetsRepository->update($request, $timeSheets);
            $status = 200;
        }

        $data = [
            'status' => $status,
            'data' => $newtimeSheets
        ];

        return $data;
    }

    public function destroy($id)
    {
        $timeSheets = $this->timeSheetsRepository->findById($id);

        $status = 404;
        $msg = "This work shift not found";
        if ($timeSheets) {
            $this->timeSheetsRepository->destroy($timeSheets);
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
        $timeSheetstrash = $this->timeSheetsRepository->getSoftDeletes();

        return $timeSheetstrash;
    }

    public function findOnlyTrashed($id)
    {
        $timeSheets = $this->timeSheetsRepository->findOnlyTrashed($id);
        $status = 200;

        if (!$timeSheets)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $timeSheets
        ];

        return $data;
    }

    public function restore($id)
    {
        $timeSheets = $this->timeSheetsRepository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This work shift not found";
        if ($timeSheets) {
            $this->timeSheetsRepository->restore($timeSheets);
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
        $timeSheets = $this->timeSheetsRepository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This work shift not found";

        if ($timeSheets) {
            $this->timeSheetsRepository->delete($timeSheets);
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
