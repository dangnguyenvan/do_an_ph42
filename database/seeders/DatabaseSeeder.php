<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        
        $this->call(ImageSeeder::class);
        
        $this->call(PromotionSeeder::class);
        $this->call(ProductPromotionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserRoleSeeder::class);
    }
}
