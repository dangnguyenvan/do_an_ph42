<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
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
            ['user_id' => '1',
            'role_id' => '1',
            'created_at' => $date,
            'updated_at' => $date,],
            ['user_id' => '2',
            'role_id' => '2',
            'created_at' => $date,
            'updated_at' => $date,],
            ['user_id' => '3',
            'role_id' => '3',
            'created_at' => $date,
            'updated_at' => $date,]
        ];

        DB::table('user_role')->insert($data);
    }
}
