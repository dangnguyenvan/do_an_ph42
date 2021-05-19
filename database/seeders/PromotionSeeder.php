<?php

namespace Database\Seeders;

use App\Enums\ActiveStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');
        $data = [
            ['name' => 'SALEOFF10',
            'description' => ' Sale Off 10% for OPPO Find X2..........  ',
            'discount' => '10',
            'begin_date' => '2021-05-19',
            'end_date' => '2021-05-30',
            'status' => ActiveStatus::ACTIVE,
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'SALEOFF10',
            'description' => ' Sale Off 10% for Samsung Galaxy S20+',
            'discount' => '10',
            'begin_date' => '2021-05-19',
            'end_date' => '2021-05-30',
            'status' => ActiveStatus::ACTIVE,
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'SALEOFF20',
            'description' => ' Sale Off 20% for iPhone 11 Pro Max 64GB',
            'discount' => '20',
            'begin_date' => '2021-05-19',
            'end_date' => '2021-05-30',
            'status' => ActiveStatus::ACTIVE,
            'created_at' => $date,
            'updated_at' => $date,],
        ];
        DB::table('promotions')->insert($data);
    }
}
