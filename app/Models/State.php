<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';

    protected $fillable = ['city_id', 'name'];


    /*
     |------------------------------
     | Reations
     |------------------------------
     |
     |
     |
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
