<?php


namespace App\Contracts;

use App\Models\Comment;

interface CommentRepositoryInterface {

    public function store($request);
}