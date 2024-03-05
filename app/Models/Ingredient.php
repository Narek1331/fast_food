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
        $locale = app()->getLocale();
        $localeMappings = config('app.languages');

        $l = $localeMappings[$locale];
        return $this->morphOne(Languageable::class, 'languageable')
        ->where('language_id',$l);
    }

    public function getNameAttribute()
    {
        $this->translate->name;
    }
}
