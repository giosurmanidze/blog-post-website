<?php 


namespace App\Services;

use App\Contracts\PostRepositoryInterface;
use App\Contracts\PostServiceInterface;
use App\Decorators\PostCacheDecorator;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class PostService implements PostServiceInterface {

    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository) {
       
        $this->postRepository = $postRepository;
    }

    
    public function getAllPosts(): Collection
    {
        return  $this->postRepository->getAll();
    }

    public function getPostById($id): ?Post
    {
        return $this->postRepository->getById($id);
    }

    public function getRecentPosts($limit = 5): Collection
    {
        return $this->postRepository->getRecent($limit);
    }
    public function storePost($request): JsonResponse
    {
        return $this->postRepository->store($request);
    }
} 
