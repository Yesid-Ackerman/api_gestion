<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    // Agrega los campos que deseas permitir la asignación masiva
    protected $fillable = [
        'date',
        'type',
        'amount',
        'reason',
    ];
}
