<?php 


namespace App\Services;

use App\Contracts\CommentRepositoryInterface;
use App\Contracts\CommentServiceInterface;

class CommentService implements CommentServiceInterface {

    protected $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository) {
        $this->commentRepository = $commentRepository;
    }

    public function storeComment($request)
    {
        return $this->commentRepository->store($request);
    }
}