<?php

// app/Models/Voucher.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vouchers extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'type',
        'value',
        'product_category',
        'points_required',
        'minimum_transaction'
    ];

    /**
     * Relasi ke user_vouchers
     */
    public function userVouchers(): HasMany
    {
        return $this->hasMany(UserVouchers::class);
    }

    /**
     * Relasi ke redemptions
     */
    public function redemptions(): HasMany
    {
        
        return $this->hasMany(Redemption::class);
    }
    
}