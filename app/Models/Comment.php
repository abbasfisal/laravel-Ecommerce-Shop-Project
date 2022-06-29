<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'product_id',
        'parent_id',
        'user_id',
        'text',
        'show'
    ];

    /*
     |------------------------------
     | Relations
     |------------------------------
     |
     |
     |
     */

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function reply()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
