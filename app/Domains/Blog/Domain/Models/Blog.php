<?php

namespace App\Domains\Blog\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'article'];
}
