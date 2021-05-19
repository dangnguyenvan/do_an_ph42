<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
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
            ['role_name' => UserRole::ROLE_USER,
            
            'created_at' => $date,
            'updated_at' => $date,],
            ['role_name' => UserRole::ROLE_SELLER,
            
            'created_at' => $date,
            'updated_at' => $date,],
            ['role_name' => UserRole::ROLE_ADMIN,
           
            'created_at' => $date,
            'updated_at' => $date,]
        ];

        DB::table('roles')->insert($data);
    }
}
