<?php

namespace App\Infrastructure\UseCase;

use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Domain\Auth\Services\TokenServiceInterface;
use App\Infrastructure\DTOs\LoginUserDTO;
use Nette\Schema\ValidationException;

readonly class LoginUserUseCase
{
    public function __construct(private UserRepositoryInterface $userRepository, private TokenServiceInterface $tokenService)
    {
    }

    public function execute(LoginUserDTO $userDTO): string
    {
        $user = $this->userRepository->findByEmail($userDTO->email);
        if (!$user || !$user->verifyPassword($userDTO->password)) {
            throw new ValidationException(messages: [
                'email' => ['Provided credentials are incorrect.']
            ]);
        }
        return $this->tokenService->createToken($user);
    }
}
