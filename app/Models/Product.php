<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'brand_id',
        'title',
        'slug',
        'price',
        'on_sale',//تخفیف
        'started_at',
        'end_at',
        'image',
        'short_description',
        'long_description',
        'note',
        'active',
        'stock',//تعداد موجودی
    ];

    /*
     |------------------------------
     | Relations
     |------------------------------
     |
     |
     |
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
