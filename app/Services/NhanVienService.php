<?php

namespace App\Services;

interface NhanVienService
{
    public function getAll();

    public function findById($id);

    public function findOnlyTrashed($id);

    public function findWithTrashed($id);

    public function findHashId($id, $hash);

    public function findFullName();

    public function create($request);

    public function update($request, $id, $hash);

    public function destroy($id);

    public function getSoftDeletes();

    public function restore($id);

    public function delete($id);
}