<?php

namespace App\Domains\Category\Domain\Services;

use App\Domains\Category\Domain\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryService {

    // Keep business logic in a seperate class

    public function index(): JsonResponse 
    {
        $categories = Category::all()->toArray();
        return response()->json($categories);
    }

}