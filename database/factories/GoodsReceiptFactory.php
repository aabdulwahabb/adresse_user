<?php

namespace Database\Factories;

use App\Models\GoodsReceipt;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsReceiptFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GoodsReceipt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'belegnr' => $this->faker->unique()->numberBetween(100000,999999),
            'projekt' => random_int(1,5),
            //'auftragid' => 0,
            'name' => $this->faker->name(),
            'strasse' => $this->faker->streetAddress(),
            'ort' => $this->faker->city(),
            'plz' => $this->faker->postcode(),
            'land' => $this->faker->countryCode(),
        ];
    }
}
