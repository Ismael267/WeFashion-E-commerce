<?php

namespace Database\Seeders;

use App\Models\Visibility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Visibility::factory()->create(["visibility"=>"publie"]);
        Visibility::factory()->create(["visibility"=>"non publie"]);
    }
}
