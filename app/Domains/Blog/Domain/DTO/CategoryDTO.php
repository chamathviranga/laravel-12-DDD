<?php

namespace App\Domains\Blog\Domain\DTO;

final class CategoryDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $title
    ) {}
}