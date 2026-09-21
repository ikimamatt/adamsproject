<?php
// app/Models/SignatureNews.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignatureNews extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'image',
        'title',
        'subtitle',
        'category',
        'is_featured',  // tambahkan is_featured untuk menandai berita unggulan
    ];
}
