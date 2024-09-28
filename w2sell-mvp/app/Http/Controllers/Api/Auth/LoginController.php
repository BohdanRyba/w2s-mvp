<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorizationResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\UserProfileResource;
use App\Infrastructure\DTOs\LoginUserDTO;
use App\Infrastructure\UseCase\LoginUserUseCase;
use Auth;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Header;

class LoginController extends Controller
{

    public function __construct(private LoginUserUseCase $loginUserUseCase)
    {
    }

    /**
     * @param Request $request
     * @return AuthorizationResource|ErrorResource
     */
    public function login(Request $request)
    {
        list($email, $password) = [$request->get('email'), $request->get('password')];

        $token = $this->loginUserUseCase->execute(new LoginUserDTO($email, $password));

        $user = Auth::attempt(['email' => $email, 'password' => $password]);
        if (!$user) {
            return (new ErrorResource([
                'message' => 'Authorization failed.',
                'code' => 404
            ]));
        }
        return new AuthorizationResource((object)[
            'token' => $token,
            'user' => Auth::user()
        ]);
    }

    #[Header("Authorization", "Bearer 14|gdFHjoF3FN6bAJIIbCwFzsolxPDFHzBfDkmbLFcPd5ddf95b ")]
    public function profile()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return (new UserProfileResource((object)[
            'user' => $user,
            'profile' => $profile
        ]));
    }
}
