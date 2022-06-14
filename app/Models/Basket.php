<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $table = 'baskets';

    protected $fillable = [
        'user_id',
        'product_id',
        'count',
        'color_id',
        'size_id',
        'attributes'
    ];

    /*
     |------------------------------
     | Relations
     |------------------------------
     |
     |
     |
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
