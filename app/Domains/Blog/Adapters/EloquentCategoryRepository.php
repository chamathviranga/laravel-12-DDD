<?php

namespace App\Domains\Blog\Adapters;

use App\Domains\Category\Domain\Models\Category;
use App\Domains\Blog\Domain\DTO\CategoryDTO;
use App\Domains\Blog\Domain\Ports\CategoryRepository;

final class EloquentCategoryRepository implements CategoryRepository
{
    public function all(): array
    {
        return Category::query()
            ->select(['id', 'title'])
            ->get()
            ->map(fn ($c) => new CategoryDTO($c->id, $c->title))
            ->all();
    }

    public function findById(int|string $id): ?CategoryDTO
    {
        $c = Category::find($id);

        return $c
            ? new CategoryDTO($c->id, $c->title)
            : null;
    }


}
