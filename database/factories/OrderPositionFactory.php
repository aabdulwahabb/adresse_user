<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderPosition;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderPositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderPosition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'auftrag' => 0,
            'artikel' => 0,
            'projekt' => 0,
            'bezeichnung' => 0,
            'menge' => random_int(1,5),
        ];
    }

    public function order()
    {
        return $this->state(function ($attributes) {
            return [
                'auftrag' => Order::inRandomOrder()->limit(1)->first(),
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
