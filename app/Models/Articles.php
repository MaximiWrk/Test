<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'article_id';

    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'text',
        'author',
    ];
}
