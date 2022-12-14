<?php

namespace Database\Factories;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tournament::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            'date_start' => $this->faker->dateTimeThisCentury(),
            'date_end' => $this->faker->dateTimeThisCentury(),
            'timezone' => 'timezone',
            'country_id' => 1,
            'poker_tour_id' => $this->faker->numberBetween(1, 3),
            'currency_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
