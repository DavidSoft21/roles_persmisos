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
        
        $this->call([
            RoleSeeder::class
        ]);
        $user =  \App\Models\User::factory(1)->create();
        $user[0]->assignRole('admin');
    }
}
