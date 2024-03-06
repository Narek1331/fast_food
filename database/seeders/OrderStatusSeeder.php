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
            ['name' => 'accepted', 'sequence' => 1],
            ['name' => 'making', 'sequence' => 2],
            ['name' => 'delivering', 'sequence' => 3],
            ['name' => 'done', 'sequence' => 4],
        ];

        OrderStatus::insert($datas);
    }
}
