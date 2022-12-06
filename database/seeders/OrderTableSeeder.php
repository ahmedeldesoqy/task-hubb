<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Order::insert([
            [
                'customer_id' => 1,
                'order_date' => now(),
            ],
            [
                'customer_id' => 1,
                'order_date' => now()->addMonth(),
            ],
            [
                'customer_id' => 1,
                'order_date' => now()->addMonth(2),
            ],
        ]);

        $orders = Order::all();

        $products = Product::all();

        foreach ($orders as $key => $order) {
            
            $order->order_details()->create([

                'product_id' =>$products[$key]->id, 
                'price'      =>$products[$key]->price, 
                'qty'        => 3, 

            ]); // end order
            
        } // end foreach
    }
}
