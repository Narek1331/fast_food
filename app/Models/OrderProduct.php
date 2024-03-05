<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'order_id',
        'size_id',
        'count',
    ];

    public $timestamps = false;

    protected $table = 'order_products';

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class,'order_product_ingredient');
    }

    public function size()
    {
        return $this->hasOne(Size::class,'id', 'size_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
