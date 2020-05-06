<?php

namespace App\Services\Impl;

use App\Repositories\UserRepository;
use App\Services\UserService;

class UserServiceImpl implements UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        $users = $this->userRepository->getAll();

        return $users;
    }

    public function findById($id)
    {
        $User = $this->userRepository->findById($id);

        $statusCode = 200;
        if (!$User)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'users' => $User
        ];

        return $data;
    }

    public function create($request)
    {
        $User = $this->userRepository->create($request);

        $statusCode = 201;
        if (!$User)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'users' => $User
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldUser = $this->userRepository->findById($id);

        if (!$oldUser) {
            $newUser = null;
            $statusCode = 404;
        } else {
            $newUser = $this->userRepository->update($request, $oldUser);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'users' => $newUser
        ];
        return $data;
    }

    public function destroy($id)
    {
        $User = $this->userRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($User) {
            $this->userRepository->destroy($User);
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
        $users = $this->userRepository->getSoftDeletes();

        return $users;
    }

    public function restore($id)
    {
        $User = $this->userRepository->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "User not found";
        if ($User) {
            $this->userRepository->restore($User);
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
        $User = $this->userRepository->findOnlyTrashed($id);

        $statusCode = 404;
        $message = "User not found";
        if ($User) {
            $this->userRepository->delete($User);
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