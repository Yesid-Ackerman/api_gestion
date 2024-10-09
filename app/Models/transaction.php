<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class transaction extends Model
{
    use HasFactory;

    // Agrega los campos que deseas permitir la asignación masiva
    protected $fillable = ['date', 'type_id', 'amount', 'reason'];

    // Relación con el modelo Type
    public function type():HasMany
    {
        return $this->HasMany(Type::class);
    }
}
