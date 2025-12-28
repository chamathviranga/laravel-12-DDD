<?php

namespace App\Domains\Blog\Domain\Controllers;

use App\Domains\Blog\Domain\Services\BlogService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $service = null;

    public function __construct(BlogService $service) {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return $this->service->index();
    }

    public function categories(): JsonResponse
    {
        return $this->service->categories();
    }
}
