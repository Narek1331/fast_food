<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'price',
        'sale_price',
        'category_id',
        'img_path'
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];


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
        return $this->translate->name;
    }

    public function getDescriptionAttribute()
    {
        return $this->translate->description;
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class,'product_ingredient');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
