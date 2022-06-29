<?php

namespace App\Models;

use Database\Factories\MainCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;



    protected $table = 'categories';

    const c_id = 'id';
    const c_title = 'title';
    const c_slug = 'slug';
    /*const c_image = 'image';*/
    const c_parent_id = 'parent_id';

    protected $fillable = [
        self::c_title,
        self::c_slug,
        /*self::c_image,*/
        self::c_parent_id
    ];

    /*
     |------------------------------
     | Relations
     |------------------------------
     |
     |
     |
     */
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
