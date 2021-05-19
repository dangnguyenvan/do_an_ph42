<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
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
            ['color_name' => 'Black',
            'product_id' => ' 1',
            'created_at' => $date,
            'updated_at' => $date,],
            ['color_name' => 'Sliver',
            'product_id' => '2',
            'created_at' => $date,
            'updated_at' => $date,],
            ['color_name' => 'blue',
            'product_id' => '3',
            'created_at' => $date,
            'updated_at' => $date,]
        ];

        DB::table('colors')->insert($data);
    }
}
