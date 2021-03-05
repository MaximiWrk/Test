<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    /**
     * List of fillable columns
     * @var $fillable array
     */
    protected $fillable = [
        'title',
        'text',
        'author',
        'category_id'
    ];
}
