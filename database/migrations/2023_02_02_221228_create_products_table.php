<?php

use App\Models\Size;
use App\Models\State;
use App\Models\Categorie;
use App\Models\Visibility;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image');
            $table->string('description');
            $table->integer('price');
            $table->string('reference',16);
            $table->foreignIdFor(Visibility::class);
            $table->foreignId("states_id");
            $table->foreignId("size_id");
            $table->foreignIdFor(Categorie::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
