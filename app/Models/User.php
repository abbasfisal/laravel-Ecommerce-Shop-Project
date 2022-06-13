<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = 'users';

    const user_type = 'user';
    const admin_type = 'admin';

    const Type = [
        self::user_type,
        self::admin_type
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'tel',
        'username',
        'type',
        'valid',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];


    /*
     |------------------------------
     | Relations
     |------------------------------
     |
     |
     |
     */

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }


}
