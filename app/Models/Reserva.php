<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    use HasFactory;
    protected $table = "reservas";

    // Relacionamento inverso: uma reserva pertence a um usuário
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

}
