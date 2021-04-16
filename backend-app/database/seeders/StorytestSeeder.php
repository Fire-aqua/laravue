<?php

namespace Database\Seeders;

use App\Models\Storytest;
use Illuminate\Database\Seeder;

class StorytestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storytest::factory()->count(10)->create();
    }
}
