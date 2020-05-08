<?php

namespace App\Services\Impl;

use App\Repositories\RoleRepository;
use App\Services\RoleService;

class RoleServiceImpl implements RoleService
{
    protected $role_Repository;

    public function __construct(RoleRepository $role_Repository)
    {
        $this->role_Repository = $role_Repository;
    }

    public function getAll()
    {
        $role = $this->role_Repository->getAll();
        return $role;
    }

    public function findById($id)
    {
        $role = $this->role_Repository->findById($id);

        $statusCode = 200;
        if (!$role)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'role' => $role
        ];

        return $data;
    }
    public function create($request)
    {
        $role = $this->role_Repository->create($request);

        $statusCode = 201;
        if (!$role)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'role' => $role
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldRole = $this->role_Repository->findById($id);

        if (!$oldRole) {
            $newRole = null;
            $statusCode = 404;
        } else {
            $newRole = $this->role_Repository->update($request, $oldRole);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'role' => $newRole
        ];
        return $data;
    }

    public function destroy($id)
    {
        $role = $this->role_Repository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($role) {
            $this->role_Repository->destroy($role);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function getSoftDeletes()
    {
        $users = $this->role_Repository->getSoftDeletes();

        return $users;
    }

    public function restore($id)
    {
        $role = $this->role_Repository->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "role not found";
        if ($role) {
            $this->role_Repository->restore($role);
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
        $role = $this->role_Repository->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "role not found";

        if ($role) {
            $this->role_Repository->delete($role);
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
