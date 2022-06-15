<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'state_id',
        'discount_id',
        'address',
        'postal_code',
        'phone',
        'status',
        'total',
        'discount_total',
        'tracking_code',
        'payment_code',
        'paied_date'
    ];

    /*
     |------------------------------
     | Relations
     |------------------------------
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
