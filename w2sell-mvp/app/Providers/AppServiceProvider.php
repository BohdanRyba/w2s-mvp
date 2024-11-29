<?php

namespace App\Providers;

use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Domain\Auth\Services\TokenServiceInterface;
use App\Domain\Cart\Repositories\CartRepositoryInterface;
use App\Domain\Cart\Services\CartServiceInterface;
use App\Domain\Order\Repositories\OrderRepositoryInterface;
use App\Domain\Order\Services\OrderServiceInterface;
use App\Domain\Product\Repositories\ProductRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\UserRepository;
use App\Infrastructure\Services\Cart\Repositories\CartRepository;
use App\Infrastructure\Services\Cart\Services\CartService;
use App\Infrastructure\Services\Order\Repositories\OrderRepository;
use App\Infrastructure\Services\Order\Services\OrderService;
use App\Infrastructure\Services\TokenService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(TokenServiceInterface::class,TokenService::class);

        $this->app->bind(CartRepositoryInterface::class,CartRepository::class);
        $this->app->bind(CartServiceInterface::class,CartService::class);

        $this->app->bind(OrderServiceInterface::class,OrderService::class);
        $this->app->bind(OrderRepositoryInterface::class,OrderRepository::class);

        // TODO: implement ProductRepository for interface
//        $this->app->bind(ProductRepositoryInterface::class,ProductReposito::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::forceScheme('https');
    }
}
