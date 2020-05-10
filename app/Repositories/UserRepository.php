<?php

namespace App\Repositories;


interface UserRepository extends Repository
{
    public function selectRole($user, $role);

    public function getSoftDeletes();

    public function restore($object);

    public function delete($object);

    public function findUsername($username);

    public function findOnlyTrashed($id);

    public function findWithTrashed($id);

    public function blockUser($id);
}