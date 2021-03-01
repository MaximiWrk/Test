<?php

namespace Database\Seeders;

use App\Models;
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
        // \App\Models\User::factory(10)->create();
         \App\Models\Articles::factory(20)->create();
    }
}
