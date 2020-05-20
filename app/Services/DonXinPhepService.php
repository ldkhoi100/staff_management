<?php

namespace App\Services;

interface DonXinPhepService
{
    public function getAll();

    public function findById($id);

    public function findMaNV();

    public function findWithDatePicker($i, $month);

    public function create($request);

    public function update($request, $id);

    public function destroy($id);

    public function getSoftDeletes();

    public function findOnlyTrashed($id);

    public function restore($id);

    public function delete($id);
}