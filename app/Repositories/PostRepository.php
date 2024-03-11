<?php 


namespace App\Repositories;

use App\Contracts\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class PostRepository implements PostRepositoryInterface {

    public function getAll(): Collection
    {
        return Post::with('comments')->get();
    }

    public function getById($id): ?Post
    {
        return Post::findOrFail($id);
    }

    public function getRecent($limit = 5): Collection
    {
        return Post::with('comments')->latest()->limit($limit)->get();
    }

    public function store(): JsonResponse
    {
        return response()->json("Post Added!");
    }
}