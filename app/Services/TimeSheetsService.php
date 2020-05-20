<?php

namespace App\Services;

interface TimeSheetsService
{
    public function getAll();

    public function findById($id);

    public function create($request);

    public function update($request, $id);

    public function destroy($id);

    public function getSoftDeletes();

    public function findOnlyTrashed($id);

    public function restore($id);

    public function delete($id);

    public function getDay($date);

    public function holiday($status,$date);

    public function baseSalary($base,$date);
}
