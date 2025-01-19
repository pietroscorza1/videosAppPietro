<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(),
            'url' => 'https://www.youtube.com/watch?v=' . $this->faker->regexify('[A-Za-z0-9]{11}'),
            'published_at' => $this->faker->dateTimeThisDecade(),
            'next' => null,
            'series_id' => null,
        ];
    }
}
