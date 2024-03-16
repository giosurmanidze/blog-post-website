<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;        
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->postService->getPostById($id);
        return view('posts.show', compact('post'));
    }

    public function getRecentPosts()
    {
        $recentPosts = $this->postService->getRecentPosts();
        return view('posts.showRecentPosts', compact('recentPosts'));
    }

    public function store(Request $request)
    {
        $this->postService->storePost($request);
        return response()->json("Post Added!");
    }
}
