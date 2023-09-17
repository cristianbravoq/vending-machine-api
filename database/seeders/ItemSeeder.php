<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            ['name' => 'Water', 'price' => 0.65, 'quantity' => 30],
            ['name' => 'Juice', 'price' => 1.00, 'quantity' => 30],
            ['name' => 'Soda', 'price' => 1.50, 'quantity' => 30],
        ]);
    }
}