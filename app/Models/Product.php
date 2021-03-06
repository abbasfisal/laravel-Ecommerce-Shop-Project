<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    /*
     |------------------------------
     | columns const name
     |------------------------------
     */
    const c_category_id = 'category_id';
    const c_brand_id = 'brand_id';
    const c_title = 'title';
    const c_slug = 'slug';
    const c_price = 'price';
    const c_on_sale = 'on_sale';
    const c_started_at = 'started_at';
    const c_end_at = 'end_at';
    const c_image = 'image';
    const c_short_description = 'short_description';
    const c_long_description = 'long_description';
    const c_note = 'note';
    const  c_active = 'active';
    const c_stock = 'stock';

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class)
                    ->withTimestamps();
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class)
                    ->withTimestamps();
    }

    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }


    public function product_galleries()
    {
        return $this->hasMany(ProductGalleries::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::clas);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
