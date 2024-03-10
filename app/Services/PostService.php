<?php 


namespace App\Services;

use App\Contracts\PostRepositoryInterface;
use App\Contracts\PostServiceInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

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
} 
