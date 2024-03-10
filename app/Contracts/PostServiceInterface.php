<?php 


namespace App\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostServiceInterface {

    public function getAllPosts(): Collection;
    public function getPostById($id): ?Post;
}