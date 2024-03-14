<?php

namespace App\Repositories;

use App\Contracts\CommentRepositoryInterface;
use App\Models\Comment;
use App\Models\Post;

class CommentRepository implements CommentRepositoryInterface {

    public function store($request)
    {
        $post = Post::find($request['post_id']);
        if(!$post) {
            throw new \Exception("Post not found");
        }
        return $post->comments()->create([
            'post_id' => $request['post_id'],
            'content' => $request['content']
        ]);
    }
}