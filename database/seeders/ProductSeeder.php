<?php

namespace Database\Seeders;

use App\Enums\ActiveStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
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
            ['name' => 'iPhone 11 Pro Max 64GB',
            'description' => ' Smart Phone',
            'quantityInStore' => ' 10',
            'ram' => ' 4GB',
            'rom' => ' 64GB',
            'battery_capacity' => ' 3046 mAh',
            'front_camera' => ' 12MP',
            'rear_camera' => ' 3 camera 12 MP',
            'price' =>'300',
            'status' => ActiveStatus::ACTIVE,
            'category_id' => ' 1',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => 'Samsung Galaxy S20+',
            'description' => ' Smart Phone',
            'quantityInStore' => ' 20',
            'ram' => ' 8GB',
            'rom' => ' 128GB',
            'battery_capacity' => ' 4500 mAh',
            'front_camera' => ' 10MP',
            'rear_camera' => ' Chính 12 MP & Phụ 64 MP, 12 MP, TOF 3D',
            'price' =>'400',
            'status' => ActiveStatus::ACTIVE,
            'category_id' => ' 2',
            'created_at' => $date,
            'updated_at' => $date,],
            ['name' => ' OPPO Find X2..........  ',
            'description' => ' Smart Phone',
            'quantityInStore' => ' 70',
            'ram' => ' 12GB',
            'rom' => ' 256GB',
            'battery_capacity' => ' 4200 mAh',
            'front_camera' => ' 32MP',
            'rear_camera' => ' Chính 48 MP & Phụ 13 MP, 12 MP',
            'price' =>'600',
            'status' => ActiveStatus::ACTIVE,
            'category_id' => ' 3',
            'created_at' => $date,
            'updated_at' => $date,],
        ];
        DB::table('products')->insert($data);
    }
}
