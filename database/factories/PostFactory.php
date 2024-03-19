<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'caption' => fake()->sentence(),
            'postContentText' => fake()->text(),
            'content_type' => 'feeds',
            'userId' => '1npvve8g3h',
            'postType' => 'text',
            'privacy' => '???? Public',
            'font_color' => 'black',
            'text_back_ground' => 'white',
            'interest' => '1',
            'active' => '1',
            'profileName' => 'asass',
            'profileImageUrl' => 'aaa',
            'location' => 'asasa'

        ];
    }
}
