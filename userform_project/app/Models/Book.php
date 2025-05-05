<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * Поля, разрешённые для массового присвоения.
     */
    protected $fillable = [
        'title',
        'author',
        'genre',
    ];
}
