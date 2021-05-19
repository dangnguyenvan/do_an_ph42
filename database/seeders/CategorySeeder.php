<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
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
            ['name' => 'oppo',
            'description' => 'brand oppo',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'samsung',
            'description' => 'brand samsung',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'iphone',
            'description' => 'brand iphone',
            'created_at' => $date,
            'updated_at' => $date,]
        ];

        DB::table('categories')->insert($data);
    }
}
