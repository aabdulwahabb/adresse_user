<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\InvoicePosition;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoicePositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvoicePosition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'rechnung' => 0,
            'artikel' => 0,
            'projekt' => 0,
            'bezeichnung' => 0,
            'menge' => random_int(1,5),
        ];
    }

    public function invoice()
    {
        return $this->state(function ($attributes) {
            return [
                'rechnung' => Invoice::inRandomOrder()->limit(1)->first(),
            ];
        });
    }

    public function item()
    {
        return $this->state(function ($attributes) {

            $item = Item::inRandomOrder()->limit(1)->first();

            return [
                'artikel' => $item,
                'bezeichnung' => $item->name_de,
                'projekt' => $item->projekt,
            ];
        });
    }
}
