<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    // Отключаем автоматические метки времени (created_at, updated_at)
    public $timestamps = false;

    // Разрешённые поля для массового присвоения
    protected $fillable = [
        'time',
        'duration',
        'ip',
        'url',
        'method',
        'input',
    ];
}
