<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_methods';

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
