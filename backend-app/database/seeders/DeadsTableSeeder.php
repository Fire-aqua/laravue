<?php

namespace Database\Seeders;

use App\Models\Dead;
use Illuminate\Database\Seeder;

class DeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dead::factory()->count(10)->create();
    }
}
