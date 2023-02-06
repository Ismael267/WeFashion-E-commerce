<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CategorieSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(VisibilitySeeder::class);
        $this->call(ProductSeeder::class);

    }
}
