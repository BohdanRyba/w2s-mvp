<?php

namespace App\Infrastructure\DTOs;

class LoginUserDTO
{
    public function __construct(public string $email,public string $password)
    {
    }
}
