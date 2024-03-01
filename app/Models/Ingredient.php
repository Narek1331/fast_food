<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function languages()
    {
        return $this->morphToMany(Language::class, 'languageable');
    }

    public function translate()
    {
        return $this->morphOne(Languageable::class, 'languageable');
    }

    public function getNameAttribute()
    {

        $this->translate->name;

    }
}
