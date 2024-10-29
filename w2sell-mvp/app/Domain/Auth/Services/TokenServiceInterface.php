<?php

namespace App\Domain\Auth\Services;

use App\Models\User;

interface TokenServiceInterface
{
    /**
     * @param User $user
     * @return string
     */
    public function createToken(User $user): string;
}
