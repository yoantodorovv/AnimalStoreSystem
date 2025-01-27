<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }
}
