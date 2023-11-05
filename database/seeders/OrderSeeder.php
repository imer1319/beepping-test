<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::factory(20)->create();

        $products = Product::factory(10)->create();

        $orders->each(function ($order) use ($products) {
            $order->orderLines()->saveMany(OrderLine::factory(5)->make([
                'product_id' => $products->random()->id,
            ]));
        });
    }
}
