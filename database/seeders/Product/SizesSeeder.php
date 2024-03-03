<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $datas = [
            ['name' => 'M'],
            ['name' => 'L'],
            ['name' => 'XL']
        ];

        Size::insert($datas);
    }
}
