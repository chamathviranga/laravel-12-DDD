<?php

namespace App\Domains\Category\Domain\Controllers;

use App\Domains\Category\Domain\Services\CategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    protected $service = null;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return $this->service->index();
    }

}
