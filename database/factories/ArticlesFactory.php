<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ArticlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories_id = DB::table('categories')->pluck('id');

        return [
            'title' => $this->faker->sentence(3),
            'text' => $this->faker->text,
            'author' => $this->faker->name,
            'category_id' => $this->faker->randomElement($categories_id),
        ];
    }
}
