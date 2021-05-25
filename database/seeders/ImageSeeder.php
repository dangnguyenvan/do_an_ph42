<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
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
            ['name' => 'ip11.png',
            'product_id' => ' 1',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'ssnote10.png',
            'product_id' => '2',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'opA52.png',
            'product_id' => '3',
            'created_at' => $date,
            'updated_at' => $date,]
        ];
        DB::table('images')->insert($data);

    }
}
