<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    use HasFactory; protected $fillable = [

        'visibility'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
