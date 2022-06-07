<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;
use Exception;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     *
     * @throws Exception
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'icon' => $this->faker->regexify('[a-z]{10}'),
            'active' => random_int(0,1),
        ];
    }
}
