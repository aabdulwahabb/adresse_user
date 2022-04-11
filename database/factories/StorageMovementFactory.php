<?php

namespace Database\Factories;

use App\Models\StorageBin;
use App\Models\StorageMovement;
use Illuminate\Database\Eloquent\Factories\Factory;

class StorageMovementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StorageMovement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'lager_platz' => StorageBin::factory(),
            'artikel' => $this->faker->randomDigit(),
            'menge' => $this->faker->randomDigit(),
            'vpe' => $this->faker->word(),
            'eingang' => $this->faker->randomDigit(),
            'zeit' => now(),
            'referenz' => $this->faker->word(),
            'bearbeiter' => $this->faker->name(),
            'projekt' => $this->faker->randomDigit(),
            'firma' => 1,
            'logdatei' => now(),
            'adresse' => $this->faker->randomDigit(),
            'bestand' => $this->faker->randomDigit(),
            'permanenteinventur' => $this->faker->randomDigit(),
            'paketannahme' => 0,
            'doctype' => 0,
            'doctypeid' => 0,
            'vpeid' => 0,
            'is_interim' => 0,
        ];
    }
}
