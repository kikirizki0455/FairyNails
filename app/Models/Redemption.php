<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Redemption extends Model
{
    protected $fillable = [
        'user_id',
        'voucher_id',
        'points_used'
    ];

    /**
     * Relasi ke User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Voucher
     */
    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Vouchers::class);
    }
}