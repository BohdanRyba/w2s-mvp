<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function findByEmail(string $email): ?User
    {
        $userModel = User::query()->where('email', $email)->first();

        if (!$userModel) {
            return null;
        }

        return $userModel;
    }
}
