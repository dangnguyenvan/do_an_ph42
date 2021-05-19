<?php

namespace Database\Seeders;

use App\Enums\ActiveStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPromotionSeeder extends Seeder
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
            ['promotion_id' => '1',
            'product_id' => '3',
            'created_at' => $date,
            'updated_at' => $date,],
            ['promotion_id' => '2',
            'product_id' => '2',
            'created_at' => $date,
            'updated_at' => $date,],
            ['promotion_id' => '3',
            'product_id' => '1',
            'created_at' => $date,
            'updated_at' => $date,]
        ];

        DB::table('product_promotion')->insert($data);
    }
}
