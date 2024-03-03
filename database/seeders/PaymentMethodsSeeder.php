<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                '1' => 'Վճարել կանխիկ',
                '2' => 'Заплатить наличными',
                '3' => 'Cash On Delivery',
            ],
            [
                '1' => 'Վճարել POS-տերմինալով',
                '2' => 'Оплата через POS-терминал',
                '3' => 'Pay by POS-terminal',
            ],
            ];

            foreach($datas as $data){
                $paymentMethod = PaymentMethod::create([]);
                foreach($data as $code => $lang){
                    $paymentMethod->languages()->attach([[
                        'language_id' => $code,
                        'name' => $lang
                    ]]);
                }
            }
    }
}
