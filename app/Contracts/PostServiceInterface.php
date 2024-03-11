<?php 


namespace App\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface PostServiceInterface {

    public function getAllPosts(): Collection;
    public function getPostById($id): ?Post;
    public function getRecentPosts($limit = 5): Collection;
    public function storePost($request):JsonResponse;
}