<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coins')->insert([
            ['value' => 0.05, 'quantity' => 100],
            ['value' => 0.10, 'quantity' => 150],
            ['value' => 0.25, 'quantity' => 100],
            ['value' => 1.00, 'quantity' => 50],
        ]);
    }
}
