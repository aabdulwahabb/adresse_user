<?php

namespace Database\Factories;

use App\Models\OrderReturn;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderReturnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderReturn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'datum'=>$this->faker->date(),
            'projekt'=>random_int(1,5),
            'belegnr'=>$this->faker->unique()->numberBetween(100000, 900000),
            'name'=>$this->faker->name(),
            'strasse'=>$this->faker->streetAddress(),
            'plz'=>$this->faker->postcode(),
            'ort'=>$this->faker->city(),
            'land'=>$this->faker->countryCode(),
        ];
    }
}
