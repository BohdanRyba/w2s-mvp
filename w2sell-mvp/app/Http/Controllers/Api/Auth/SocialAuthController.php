<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();

        // Логіка для створення або пошуку користувача в базі даних
        $user = User::find(1);
        // Створення токену з допомогою Sanctum
        $token = $user->createToken('token-name')->plainTextToken;

        // Повернення токену на фронтенд
        return response()->json(['token' => $token]);
    }
}
