<?php

namespace App\Lib\User;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'position',
        'password',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return void
     * @throws ValidationException
     */
    public function validate()
    {
        $validator = Validator::make(
            $this->attributesToArray(),
            [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email_address' => 'required|email|unique:users,email_address,' . $this->id,
            'password' => 'required|min:6|max:255|confirmed',
            'position' => 'required|max:255',
        ]
        );

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * @return void
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return void
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return void
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return void
     */
    public function getPassword()
    {
    }

    /**
     * @return void
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
