<?php

namespace Database\Factories;

use App\Models\GoodsReceipt;
use App\Models\GoodsReceiptPosition;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsReceiptPositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GoodsReceiptPosition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bestellung' => 0,
            'artikel' => 0,
            'projekt' => 0,
            'bezeichnunglieferant' => 0,
            'menge' => random_int(1,5),
        ];
    }

    public function goodsReceipt()
    {
        return $this->state(function ($attributes) {
            return [
                'bestellung' => GoodsReceipt::inRandomOrder()->limit(1)->first(),
            ];
        });
    }

    public function item()
    {
        return $this->state(function ($attributes) {

            $item = Item::inRandomOrder()->limit(1)->first();

            return [
                'artikel' => $item,
                'bezeichnunglieferant' => $item->name_de,
                'projekt' => $item->projekt,
            ];
        });
    }

}
