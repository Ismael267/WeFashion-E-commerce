<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Size;
use App\Models\State;
use App\Models\Visibility;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /*
   la méthode files est utilisée pour récupérer tous les fichiers dans le dossier public/images.
*/
        /*
   la méthode pluck quanta elle est utilisée pourpour extraire une colonne spécifique d'un tableau d'objets ou de tableaux associatifs.
*/
        $files = File::files('storage/images');

        // // Boucle sur chaque image pour générer des données fictives
        // foreach ($files as $file) {
        //     // Sélectionner une image aléatoirement
        //     $image = $files[array_rand($files)];
        // }
        // $bon=
        // $images=basename($directory);
        $frgnKey_cat = Categorie::pluck('id');
        $frgnKey_sta = State::pluck('id');
        $frgnKey_si = Size::pluck('id');
        $frgnKey_vi = Visibility::pluck('id');


        // dd($foreignKey);

        return [
            'title' => $this->faker->streetName(),
            'description' => $this->faker->text(10),
            'size_id' => $this->faker->randomElement($frgnKey_si),
            'states_id' => $this->faker->randomElement($frgnKey_sta),
            'visibility_id' => $this->faker->randomElement($frgnKey_vi),
            'price' => $this->faker->numberBetween(30, 50) * 100,
            "image" => $this->faker->randomElement($files),
            "reference" => $this->faker->bothify('??????######????'),
            'categorie_id' => $this->faker->randomElement($frgnKey_cat),
        ];
    }
}
