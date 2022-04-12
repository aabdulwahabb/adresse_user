<?php

namespace Database\Factories;

use App\Models\Adresse;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdresseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Adresse::class;

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
            'usereditid' => random_int(1,5),
            'typ' => $this->faker->randomElement(['herr', 'frau']),
            'firma' => 1,
            'logdatei' => now(),
            'useredittimestamp' => now(),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'strasse' => $this->faker->streetAddress(),
            'ort' => $this->faker->city(),
            'plz' => $this->faker->postcode(),
            'land' => "DE",
            'mitarbeiternummer' => $this->faker->unique()->numberBetween(100000,999999),
            'abteilung' => "Versandmanufaktur",
            'sprache' => "deutsch",
            'waehrung' => "EUR",
            'versandart' => "DHL",
            'zahlungsweise' => "rechnung",
            'zahlungsweiselieferant' => "rechnung",
            'rechnung_typ' => "firma",
            'rechnung_land' => "DE",
            'mandatsreferenzart' => "einmalig",
            'mandatsreferenzwdhart' => "erste",
            'art' => "standardauftrag",
            'bundesstaat' => "NW",

        ];
    }
}
