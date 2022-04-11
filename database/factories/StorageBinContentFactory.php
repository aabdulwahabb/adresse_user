<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\StorageBin;
use App\Models\StorageBinContent;
use Illuminate\Database\Eloquent\Factories\Factory;

class StorageBinContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StorageBinContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'lager_platz' => 0,
            'artikel' => Item::factory(),
            'menge' => $this->faker->randomDigit(),
            'vpe' => $this->faker->randomDigit(),
            'bearbeiter' => $this->faker->name(),
            'bestellung' => $this->faker->randomDigit(),
            'projekt' => 0,
            'firma' => 0,
            'logdatei' => now(),
            'inventur' => 0,
            'lager_platz_vpe' => 0
        ];
    }

    public function storageBin()
    {
        return $this->state(function ($attributes) {
           return [
               'lager_platz' => StorageBin::inRandomOrder()->limit(1)->first(),
           ];
        });
    }

    public function item()
    {
        return $this->state(function ($attributes) {
            return [
                'artikel' => Item::inRandomOrder()->limit(1)->first(),
            ];
        });
    }
}
