<?php 

namespace App\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface PostRepositoryInterface {
    
    public function getAll(): Collection;
    public function getById($id): ?Post;
    public function getRecent($limit = 5): Collection;
    public function store($request): JsonResponse;
}