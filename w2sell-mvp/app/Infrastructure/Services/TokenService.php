<?php

namespace App\Infrastructure\Services;

use App\Domain\Auth\Services\TokenServiceInterface;
use App\Models\User;

class TokenService implements TokenServiceInterface
{

    public function createToken(User $user): string
    {
        return $user->createToken('auth_token')->plainTextToken;
    }
}
