<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Languageable extends Model
{
    use HasFactory;

    public function languageable()
    {
        return $this->morphTo();
    }
}
