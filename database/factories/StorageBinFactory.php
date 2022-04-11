<?php

namespace Database\Factories;

use App\Models\Storage;
use App\Models\StorageBin;
use Illuminate\Database\Eloquent\Factories\Factory;

class StorageBinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StorageBin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'lager' => 0,
            'kurzbezeichnung' => $this->faker->numerify('##-##-##-##'),
            'bemerkung' => 0,
            'projekt' => $this->faker->randomDigit(),
            'firma' => 1,
            'geloescht' => 0,
            'logdatei' => now(),
            'autolagersperre' => 0,
            'verbrauchslager' => 0,
            'sperrlager' => 0,
            'palettenlager' => 0,
            'lhm' => 0,
            'fachbodenlager' => 0,
            'lagerkategorie' => 0,
            'laenge' => $this->faker->randomDigit(),
            'breite' => $this->faker->randomDigit(),
            'hoehe' => $this->faker->randomDigit(),
            'poslager' => 0,
            'adresse' => 0,
            'rownumber' => $this->faker->randomDigit(),
            'abckategorie' => 0,
            'regalart' => 0,
            'allowproduction' => 0,
        ];
    }
    public function storage()
    {
        return $this->state(function ($attributes) {
            return [
                'lager' => 1,
            ];
        });
    }
}
