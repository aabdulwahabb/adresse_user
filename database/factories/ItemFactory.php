<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nummer' => $this->faker->unique()->numberBetween(100000,999999),
            'projekt' => random_int(1,5),
            'herstellernummer' => $this->faker->bothify('####-####-????'),
            'ean' => $this->faker->numerify('#############'),
            'firma' => 1,
            'logdatei' => now(),
            'name_de' => $this->faker->state() . ' ' . $this->faker->state(),
            'lagerartikel' => 1,
            'stueckliste' => 0,
            'juststueckliste' => 0,
        ];
    }
}
