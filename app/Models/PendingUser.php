<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingUser extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'birthdate',
        'gender',
    ];

    // Jika Anda ingin menggunakan $guarded sebagai alternatif
    // protected $guarded = [];
}