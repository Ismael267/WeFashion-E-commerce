<?php

namespace App\Models;

use App\Models\State;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public function getPrice()
    {
        $price = $this->price;

        return number_format($price, 0, ', ', ' ') ." ".  "francs CFA";
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'state',
        'Reference',
        'size',
        'visibility',
        'image'

    ];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function states()
    {
        return $this->belongsTo(State::class);
    }
    public function sizes()
    {
        return $this->belongsTo(Size::class);
    }
    public function visibility()
    {
        return $this->belongsTo(Visibility::class);
    }
}
