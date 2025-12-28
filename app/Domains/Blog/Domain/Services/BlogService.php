<?php

namespace App\Domains\Blog\Domain\Services;

use Illuminate\Http\JsonResponse;
use App\Domains\Blog\Domain\Models\Blog;
use App\Domains\Blog\Domain\Ports\CategoryRepository;

class BlogService {

    public function __construct(private readonly CategoryRepository $categoryRepository)
    {

    }

    public function index(): JsonResponse
    {
        $blogs = Blog::all()->toArray();
        return response()->json($blogs);
    }

    public function categories(): JsonResponse
    {
        $categories = $this->categoryRepository->all();
        return response()->json($categories);
    }

}