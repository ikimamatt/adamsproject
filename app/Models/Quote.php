<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    // Specify the table name explicitly if it's not the plural form of the model name
    protected $table = 'quotes'; // Since your table is 'quotes', not 'quote'

    // The fields that can be mass-assigned
    protected $fillable = [
        'title', // Title column
        'subtitle', // Subtitle column
    ];

    // Optional: If you do not have timestamps, you can set this to false
    public $timestamps = false; // Set to false if your table doesn't have created_at and updated_at
}

