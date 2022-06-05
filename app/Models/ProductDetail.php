<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    /*
     |------------------------------
     | const column name
     |------------------------------
     */

    const c_product_id = 'product_id';
    const c_title = 'title';
    const c_description = 'description';


    protected $fillable = ['product_id', 'title', 'description'];


    /*
     |------------------------------
     | Relations
     |------------------------------
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
