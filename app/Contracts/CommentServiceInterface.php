<?php 

namespace App\Contracts;

interface CommentServiceInterface {
 
    public function storeComment($request);
}