<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * List of fillable columns
     * @var $fillable array
     */
    protected $fillable = [
        'category_name',
    ];

    /**
     * @return HasMany
     * @property-read Collection|Article[]
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
