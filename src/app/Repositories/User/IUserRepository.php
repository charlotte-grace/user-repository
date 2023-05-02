<?php

namespace App\Repositories\User;

use App\Lib\User\User;

interface IUserRepository
{
    /**
     * @return array
     */
    public function getAllUsers(): array;

    /**
     * @param User $user
     * @return void
     */
    public function addUser(User $user): void;

    /**
     * @param int $userId
     * @return void
     */
    public function deleteUser(int $userId): void;

    /**
     * @param int $userId
     * @return User|null
     */
    public function getUserById(int $userId): ?User;
}
