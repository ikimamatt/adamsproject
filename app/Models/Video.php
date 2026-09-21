<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['link']; // Pastikan 'link' bisa diupdate

    // Jika Anda memiliki kolom timestamps di tabel, Anda bisa menambahkan:
    // public $timestamps = true;
}
