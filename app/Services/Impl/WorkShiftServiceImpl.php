<?php

namespace App\Services\Impl;

use App\Repositories\WorkShiftRepository;
use App\Services\WorkShiftService;

class WorkShiftServiceImpl implements WorkShiftService
{
    protected $workShiftRepository;

    public function __construct(WorkShiftRepository $workShiftRepository)
    {
        $this->workShiftRepository = $workShiftRepository;
    }

    public function getAll()
    {
        $workshift = $this->workShiftRepository->getAll();

        return $workshift;
    }

    public function findById($id)
    {
        $workshift = $this->workShiftRepository->findById($id);

        $status = 200;
        if (!$workshift)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $workshift
        ];

        return $data;
    }

    public function create($request)
    {
        $workshift = $this->workShiftRepository->create($request);

        $status = 201;
        if (!$workshift)
            $status = 500;

        $data = [
            'status' => $status,
            'data' => $workshift
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $workshift = $this->workShiftRepository->findById($id);

        if (!$workshift) {
            $newworkshift = null;
            $status = 404;
        } else {
            $newworkshift = $this->workShiftRepository->update($request, $workshift);
            $status = 200;
        }

        $data = [
            'status' => $status,
            'data' => $newworkshift
        ];

        return $data;
    }

    public function destroy($id)
    {
        $workshift = $this->workShiftRepository->findById($id);

        $status = 404;
        $msg = "This work shift not found";
        if ($workshift) {
            $this->workShiftRepository->destroy($workshift);
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
        $workshifttrash = $this->workShiftRepository->getSoftDeletes();

        return $workshifttrash;
    }

    public function findOnlyTrashed($id)
    {
        $workshift = $this->workShiftRepository->findOnlyTrashed($id);
        $status = 200;

        if (!$workshift)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $workshift
        ];

        return $data;
    }

    public function restore($id)
    {
        $workshift = $this->workShiftRepository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This work shift not found";
        if ($workshift) {
            $this->workShiftRepository->restore($workshift);
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
        $workshift = $this->workShiftRepository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This work shift not found";

        if ($workshift) {
            $this->workShiftRepository->delete($workshift);
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
