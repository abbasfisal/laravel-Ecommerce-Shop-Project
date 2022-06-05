<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGalleries extends Model
{
    use HasFactory;

    protected $table = 'product_galleries';

    /*
     |------------------------------
     | const column Name
     |------------------------------
     */
    const c_product_id = 'product_id';
    const c_image = 'image';



    protected $fillable = [
        'product_id',
        'image'
    ];


    /*
     |------------------------------
     | Relation
     |------------------------------
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
