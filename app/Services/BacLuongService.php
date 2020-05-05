<?php

namespace App\Services;

interface BacLuongService
{
    public function getAll();

    public function findById($id);

    public function create($request);

    public function update($request, $id);

    public function destroy($id);

    public function getSoftDeletes();

    public function restore($id);

    public function delete($id);
}
