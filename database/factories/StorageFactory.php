<?php

namespace Database\Factories;

use App\Models\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class StorageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Storage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'bezeichnung' => $this->faker->unique()->word(),
            'beschreibung' => $this->faker->unique()->slug(),
            'manuell' => 0,
            'firma' => 1,
            'geloescht' => 0,
            'logdatei' => now(),
            'projekt' => 0,
            'adresse' => 0,
        ];
    }
}
