<?php

namespace Database\Factories;

use App\Models\Order;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

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
            'datum' => $this->faker->date,
            'belegnr' => $this->faker->unique()->numberBetween(100000,999999),
            'projekt' => random_int(1,5),
            'internet' => $this->faker->unique()->numberBetween(100000,999999),
            'firma' => 1,
            'logdatei' => now(),
            'name' => $this->faker->name(),
            'strasse' => $this->faker->streetAddress(),
            'ort' => $this->faker->city(),
            'plz' => $this->faker->postcode(),
            'land' => $this->faker->countryCode(),
            'versandart' => "DHL",

        ];
    }
}
