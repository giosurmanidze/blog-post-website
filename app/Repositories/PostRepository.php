<?php 


namespace App\Repositories;

use App\Contracts\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface {

    public function getAll(): Collection
    {
        return Post::all();
    }

    public function getById($id): ?Post
    {
        return Post::findOrFail($id);
    }

    public function getRecent($limit = 5): Collection
    {
        return Post::latest()->limit($limit)->get();
    }

}