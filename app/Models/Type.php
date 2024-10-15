<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['type'];

    // Relación con el modelo Transaction
    public function transactions():HasMany
    {
        return $this->HasMany(Transaction::class);
    }
}
