<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $fillable = [
        // 'order_number', 
    // ];

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'user_id',
        'state_id',
        'settlement_id',
        'payment_method_id',
        'notes',
        'payed',
        'ended',
        'order_number'
    ];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function Status()
    {
        return $this->hasOne(OrderStatus::class,'id','status');
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function state(){
        return $this->belongsTo(State::class,'state_id');
    }

    public function settlement(){
        return $this->belongsTo(Settlement::class,'settlement_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }


}
