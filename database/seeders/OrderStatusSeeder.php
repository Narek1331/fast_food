<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ['name' => 'accepted', 'order_by' => 1],
            ['name' => 'making', 'order_by' => 2],
            ['name' => 'delivering', 'order_by' => 3],
            ['name' => 'done', 'order_by' => 4],
        ];

        OrderStatus::insert($datas); 
    }
}
