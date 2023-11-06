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
            $numOrderLines = rand(1, 5);

            for ($i = 0; $i < $numOrderLines; $i++) {
                $order->orderLines()->create([
                    'product_id' => $products->random()->id,
                    'qty' => rand(10, 100)
                ]);
            }
        });
    }
}
