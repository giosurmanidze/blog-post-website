<?php

namespace App\Providers;

use App\Contracts\PostRepositoryInterface;
use App\Contracts\PostServiceInterface;
use App\Decorators\PostCacheDecorator;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, function($app) {
            // Assuming PostRepository already implements PostRepositoryInterface and you want to wrap it with the PostCacheDecorator
            $repository = $app->make(PostRepository::class); // Create the actual repository
            return new PostCacheDecorator($repository); // Wrap it in the cache decorator
        });
        
        $this->app->bind(PostServiceInterface::class, PostService::class);
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
