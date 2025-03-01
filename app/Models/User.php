<?php

namespace App\Models;



use Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'birthdate',
        'phone',
        'address',
        'gender',
        'level',
        'exp',
        'points'
    ];

    public function isAdmin()
{
    return $this->role === 'admin'; // Sesuaikan dengan kolom role di database
    // atau: return $this->hasRole('admin'); // Jika menggunakan Spatie Permission
}

public function vouchers()
{
    return $this->hasMany(UserVouchers::class);
}

public function transactions(): HasMany
{
    return $this->hasMany(Transactions::class, 'user_id', 'id');
}


public function redemptions(): HasMany
{
    return $this->hasMany(Redemption::class);
}
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function getDiscountLevel()
{
    $level = $this->level;
    
    if ($level == 'silver') {
        return ['level' => 'Silver', 'discount' => 3];
    } elseif ($level == 'gold') {
        return ['level' => 'Gold', 'discount' => 5];
    } elseif ($level == 'platinum') {
        return ['level' => 'Platinum', 'discount' => 8];
    }

    return ['level' => 'bronze', 'discount' => 0]; // Jika tidak masuk kategori
}

}
