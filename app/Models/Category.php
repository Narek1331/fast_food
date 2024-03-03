<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'img_path'
    ];

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
        return $this->translate->name;
    }


}
