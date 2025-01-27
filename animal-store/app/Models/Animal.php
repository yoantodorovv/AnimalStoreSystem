<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'birth_date', 
        'species_id', 
        'breed_id',
        'image_path',
    ];

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
}
