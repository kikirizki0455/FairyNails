<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price'
    ];

    // Relasi ke tabel products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}