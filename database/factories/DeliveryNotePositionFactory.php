<?php

namespace Database\Factories;

use App\Models\DeliveryNote;
use App\Models\DeliveryNotePosition;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryNotePositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryNotePosition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'lieferschein' => 0,
            'artikel' => 0,
            'projekt' => 0,
            'bezeichnung' => 0,
            'menge' => random_int(1,5),
        ];
    }

    public function deliveryNote()
    {
        return $this->state(function ($attributes) {
            return [
                'lieferschein' => DeliveryNote::inRandomOrder()->limit(1)->first(),
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
