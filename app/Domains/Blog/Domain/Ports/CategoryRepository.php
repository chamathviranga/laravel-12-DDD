<?php

namespace App\Domains\Blog\Domain\Ports;

use App\Domains\Blog\Domain\DTO\CategoryDTO;

interface CategoryRepository
{

    /**
     * Fetch all categories
     * 
     * @return CategoryDTO[]
     */

    public function all(): array;

    public function findById(int $id): ?CategoryDTO;
}
