<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        $userIds = User::where('id' ,'>' ,0)->pluck('id')->toArray();
        $categoryIds = Category::where('id' ,'>' ,0)->pluck('id')->toArray();
        return [
            'title' => ucfirst(implode(' ', $this->faker->words(random_int(1, 8)))),
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(random_int(2, 12))) . '</p>',
            'user_id' => $userIds[array_rand($userIds)],
            'category_id' => $categoryIds[array_rand($categoryIds)],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
