<?php

namespace App\Services;

interface UserService
{
    public function getAll();

    public function findById($id);

    public function findOnlyTrashed($id);

    public function findWithTrashed($id);

    public function findRoleUser($id);

    public function findHashId($id, $hash);

    public function create($request);

    public function update($request, $id, $hash);

    public function destroy($id);

    public function getSoftDeletes();

    public function restore($id);

    public function delete($id);

    public function blockUser($id);
}