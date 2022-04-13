<?php

namespace Database\Factories;

use App\Models\AdresseRolle;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdresseRolleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdresseRolle::class;

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
            'adresse' => random_int(0,5),
            'projekt' => random_int(0,5),
            'subjekt' => $this->faker->randomElement(['Mitarbeiter', 'Kunde', 'Mitglied']),
            'objekt' => $this->faker->randomElement(['Projekt', 'Gruppe']),
            'praedikat' => "von",
            'parameter' => random_int(1,5),
            'von' => now(),
            'bis' => date('0000-00-00'),

        ];
    }
}
