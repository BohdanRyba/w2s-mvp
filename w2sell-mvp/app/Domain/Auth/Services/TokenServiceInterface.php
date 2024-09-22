<?php

namespace App\Domain\Auth\Services;

use App\Models\User;

interface TokenServiceInterface
{
    public function createToken(User $user): string;
}
