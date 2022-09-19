<?php

namespace Database\Factories;

use App\Models\LiveReport;
use Illuminate\Database\Eloquent\Factories\Factory;

class LiveReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LiveReport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $levels = ['Level 9 200/500', 'level 14 2000/5000', 'level 30 5000/7000', 'Level 40 6000/8000'];

        return [
            'title' => $this->faker->title,
            'content' => $this->faker->paragraph,
            'day' => $this->faker->numberBetween(1, 3),
            'level_id' => rand(1, 4),
            'players' => $this->faker->name,
            'poker_event_id' => $this->faker->numberBetween(1, 3),
            'article_author_id' => 1,
            'date_added' => $this->faker->date,
            'image_caption' => $this->faker->name,
        ];
    }
}
