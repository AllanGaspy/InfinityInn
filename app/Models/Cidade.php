<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cidade extends Model
{
    use HasFactory;
    protected $table = "cidades";

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

}
