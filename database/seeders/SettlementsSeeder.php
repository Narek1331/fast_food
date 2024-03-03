<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\Settlement;

class SettlementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stateArmavir = State::where('name', 'Արմավիր')->first();

        $datas =[
            [
                'state_id' => $stateArmavir->id,
                'name' => 'քաղաք Արմավիր'
            ]
            ];

        Settlement::insert($datas);

    }
}
