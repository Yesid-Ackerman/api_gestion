<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class transaction extends Model
{
    use HasFactory;

    // Agrega los campos que deseas permitir la asignación masiva
    protected $fillable = ['date', 'type_id', 'amount', 'reason', 'user_id'];
    protected $allowIncluded = ['type', 'user'];

    // Relación con el modelo Type
    public function type():BelongsTo
    {
        return $this->BelongsTo(Type::class);
    }
    public function user():BelongsTo
    {
        return $this->BelongsTo(Transaction::class);
    }
    public function scopeIncluded(Builder $query): void
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));
        $allowIncluded = collect($this->allowIncluded);

        foreach ($relations as $key => $relationship) {
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }
}
