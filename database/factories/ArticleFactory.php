<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'text' => $this->faker->text(1500),
            'category_id' => Category::all()->random()->id,
            'image' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Article $article) {
            $article->tags()->attach(
                Tag::all()->random(3)->pluck('id')->toArray()
            );
        });
    }
}
