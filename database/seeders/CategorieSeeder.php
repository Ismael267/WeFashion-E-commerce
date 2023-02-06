<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Categorie::factory()->create(["categorie_name"=>"homme"]);
        Categorie::factory()->create(["categorie_name"=>"femme"]);


    }
}
