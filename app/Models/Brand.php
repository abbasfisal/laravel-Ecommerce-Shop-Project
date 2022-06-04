<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    const c_id = 'id';
    const c_title = 'title';
    const c_slug = 'slug';
    const c_image = 'image';

    protected $fillable = [
        'title',
        'slug',
        'image'
    ];

    /*
     |------------------------------
     | Relation
     |------------------------------
     |
     |
     |
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
