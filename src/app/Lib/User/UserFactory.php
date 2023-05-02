<?php

namespace Database\Factories;

use App\Lib\User\User;
use Illuminate\Database\Eloquent\Factory;

class UserFactory extends Factory
{
    /**
     * @var string
     */
    protected string $model = User::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email_address' => $this->faker->unique()->safeEmail,
            'position' => $this->faker->jobTitle,
            'password' => bcrypt('password'), // default password for testing purposes
        ];
    }
}
