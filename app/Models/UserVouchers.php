<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserVouchers extends Model
{
    protected $fillable = [
        'user_id',
        'voucher_id',
        'is_used',
        'expire_date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Vouchers::class);
    }
}
