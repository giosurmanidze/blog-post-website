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

    public function store($request): ?Post
    {
        $post = Post::create([
            'title' => $request['title'],
            'content' => $request['content']
        ]);

        return $post;
    }
}