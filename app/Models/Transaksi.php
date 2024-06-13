<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Define the table associated with the model if not following naming conventions
    protected $table = 'transaksis'; // Assuming your table name is 'transaksis'

    // Define fillable fields to protect against mass assignment
    protected $fillable = [
        'id_transaksi',
        'name_user',
        'judul_buku',
        'gambar_buku',
        // Add other fields as necessary
    ];
}
