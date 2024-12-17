<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registrations'; // Pastikan nama tabel sesuai dengan yang kamu buat
    protected $fillable = ['name', 'email', 'password']; // Kolom yang diizinkan diisi
}
