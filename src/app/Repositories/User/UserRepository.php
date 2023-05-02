<?php

namespace App\Repositories\User;

use App\Lib\User\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements IUserRepository
{
    /**
     * @return array
     */
    public function getAllUsers(): array
    {
        $users = DB::table('users')->get();
        $userEntities = [];

        foreach ($users as $user) {
            $userEntities[] = new User(collect($user)->toArray());
        }

        return $userEntities;
    }

    /**
     * @param User $user
     * @return void
     */
    public function addUser(User $user): void
    {
        DB::table('users')->insert([
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'email_address' => $user->getEmailAddress(),
            'position' => $user->getPosition(),
        ]);
    }

    /**
     * @param int $userId
     * @return void
     */
    public function deleteUser(int $userId): void
    {
        DB::table('users')->where('id', $userId)->delete();
    }

    /**
     * @param int $userId
     * @return User|null
     */
    public function getUserById(int $userId): ?User
    {
        $user = DB::table('users')->where('id', $userId)->first();

        if (!$user->exists) {
            return null;
        }

        return new User(collect($user)->toArray());
    }
}
