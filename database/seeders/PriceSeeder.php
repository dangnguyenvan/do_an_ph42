<?php

namespace Database\Seeders;

use App\Enums\ActiveStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
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
            ['price' => '500',
            'product_id' => ' 1',
            'begin_date' => '2021-05-19',
            'end_date' => '2021-05-30',
            'status' => ActiveStatus::ACTIVE,
            'created_at' => $date,
            'updated_at' => $date,],
            ['price' => '400',
            'product_id' => ' 2',
            'begin_date' => '2021-05-19',
            'end_date' => '2021-05-30',
            'status' => ActiveStatus::ACTIVE,
            'created_at' => $date,
            'updated_at' => $date,],
            ['price' => '600',
            'product_id' => ' 3',
            'begin_date' => '2021-05-19',
            'end_date' => '2021-05-30',
            'status' => ActiveStatus::ACTIVE,
            'created_at' => $date,
            'updated_at' => $date,],
        ];
        DB::table('prices')->insert($data);
    }
}
