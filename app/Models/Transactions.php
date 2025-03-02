<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transactions extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'points_earned',
        'xp_earned',
        'voucher_id',
        'discount_amount',
        'payment_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function voucher()
    {
        return $this->belongsTo(Vouchers::class, 'voucher_id'); // pastikan nama kolom foreign key sudah benar
    }
    public function userVoucher()
{
    return $this->belongsTo(UserVouchers::class, 'voucher_id');
    // Pastikan nama kolom foreign key ('user_voucher_id') sesuai dengan 
    // kolom yang ada di tabel transactions
}


public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function getSelectedTransactions(){
        return $this->whereIn('id');
    }

    public function scopeByStatus($query, $status)
    {
        if (!empty($status)) {
            return $query->where('payment_status', $status);
        }
        
        return $query;
    }
}