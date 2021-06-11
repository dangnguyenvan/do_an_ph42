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
            'updated_at' => $date,],
            ['name' => 'oppoa93.png',
            'product_id' => '4',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'ip1264gb.png',
            'product_id' => ' 5',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'ip12promax128gb.png',
            'product_id' => ' 6',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'ipse128gb.png',
            'product_id' => ' 7',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'ipxr128gb.png',
            'product_id' => ' 8',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'ssgalaxya20.png',
            'product_id' => '9',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'ssgalaxym51.png',
            'product_id' => '10',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'ssgalaxyzfold25g.png',
            'product_id' => '11',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'ssgalaxynote20ultra5g.png',
            'product_id' => '12',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'oppoa94.png',
            'product_id' => '13',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'opporeno5.png',
            'product_id' => '14',
            'created_at' => $date,
            'updated_at' => $date,],
        ];
        DB::table('images')->insert($data);

    }
}
