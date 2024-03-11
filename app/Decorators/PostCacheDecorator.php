<?php

namespace App\Decorators;

use App\Contracts\PostRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostCacheDecorator implements PostRepositoryInterface
{
    protected $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById($id): ?Post
    {
        return $this->repository->getById($id);
    }

    public function getRecent($limit = 5): Collection
    {
        $cacheKey = "recent_posts_{$limit}";
        $cacheDuration = 60; // Cache for 60 minutes

        return Cache::remember($cacheKey, $cacheDuration, function () use ($limit) {
            return $this->repository->getRecent($limit);
        });
    }
}
