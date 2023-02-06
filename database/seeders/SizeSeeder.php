<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Size::factory()->create(["size"=>"XS"]);
        Size::factory()->create(["size"=>"L"]);
        Size::factory()->create(["size"=>"XL"]);
        Size::factory()->create(["size"=>"M"]);
        Size::factory()->create(["size"=>"S"]);
    }
}
