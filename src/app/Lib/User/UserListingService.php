<?php

namespace App\Lib\User;

use App\Repositories\User\IUserRepository;
use Illuminate\Validation\ValidationException;

class UserListingService
{
    /**
     * @var IUserRepository
     */
    private IUserRepository $userRepository;

    /**
     * @param IUserRepository $userRepository
     */
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return array
     */
    public function getAllUsers(): array
    {
        return $this->userRepository->getAllUsers();
    }

    /**
     * @throws ValidationException
     */
    public function addUser(array $attributes): void
    {
        $user = new User($attributes);
        $user->validate();

        $this->userRepository->addUser($user);
    }

    /**
     * @param int $userId
     * @return void
     */
    public function deleteUser(int $userId): void
    {
        $this->userRepository->deleteUser($userId);
    }
}
