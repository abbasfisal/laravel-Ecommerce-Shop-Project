<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    const status_new = 'new';
    const status_paid = 'paid';
    const status_canceled = 'canceled';
    const status_fail = 'fail';
    const status_pending = 'pending';
    const status_delivered = 'delivered';


    const status = [
        self::status_new,
        self::status_paid,
        self::status_canceled,
        self::status_fail,
        self::status_pending,
        self::status_delivered
    ];

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


    public static function getOrderStatus()
    {
        return [
            self::status_pending,
            self::status_delivered,
            self::status_canceled
        ];
    }

    public static function IsStatusExist($status)
    {
        return in_array($status, self::getOrderStatus());

    }

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

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
