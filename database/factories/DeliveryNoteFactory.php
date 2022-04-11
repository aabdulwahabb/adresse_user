<?php

namespace Database\Factories;

use App\Models\DeliveryNote;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryNoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryNote::class;

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
            'auftragid' => 0,
            'name' => $this->faker->name(),
            'strasse' => $this->faker->streetAddress(),
            'ort' => $this->faker->city(),
            'plz' => $this->faker->postcode(),
            'land' => $this->faker->countryCode(),
            'versandart' => 'DHL',
        ];
    }

    public function order()
    {
        return $this->state(function ($attributes) {
            return [
                'auftragid' => Order::inRandomOrder()->limit(1)->first(),
            ];
        });
    }
}
