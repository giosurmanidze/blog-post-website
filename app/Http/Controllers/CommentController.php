<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    protected $commentService;

    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    public function store(Request $request): JsonResponse
    {
        $this->commentService->storeComment($request);
        return response()->json("Comment added!");
    }
}
