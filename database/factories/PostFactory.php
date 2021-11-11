<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,5)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // 'body' =>'<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5,15))) . '</p>',
            'body' => collect($this->faker->paragraphs(mt_rand(5,15)))->map(fn($p) =>"<p>$p</p>")
            ->implode(''),
            'user_id' => mt_rand(1,10),
            'category_id' => mt_rand(1,4)
        ];
    }
}