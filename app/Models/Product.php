<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'price',
        'category',
    ];
    // app/Models/Product.php
public function transactionDetails(): HasMany{
    return $this->hasMany(TransactionDetail::class);
}
public function cart()
{
    return $this->hasMany(Cart::class);
}
}
