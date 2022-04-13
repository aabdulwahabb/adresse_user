<?php

namespace Database\Factories;

use App\Models\UserRight;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserRightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserRight::class;

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
            'user' => random_int(1,10),
            'module' => $this->faker->randomElement(['benutzer', 'adresse', 'ajax']),
            'action' => $this->faker->randomElement(['chrights', 'delete', 'abrechnungzeit']),
            'permission' => 1,

        ];
    }
}
