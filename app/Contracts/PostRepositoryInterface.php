<?php 

namespace App\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface {
    
    public function getAll(): Collection;
    public function getById($id): ?Post;
}