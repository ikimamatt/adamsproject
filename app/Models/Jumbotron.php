<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jumbotron extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'jumbotrons';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'text_left',
        'text_right',
        'background_image',
        'profile_image',
    ];
}
