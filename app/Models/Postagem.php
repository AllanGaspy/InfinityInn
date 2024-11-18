<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Postagem extends Model
{
    use HasFactory;
    protected $table = "postagens";
    protected $casts = [
        'images' => 'json'
    ];

    public function cidade(): HasOne
    {
        return $this->hasOne(Cidade::class,'id' ,'cidade_id' );
    }

    public function estado(): HasOne
    {
        return $this->hasOne(Estado::class, 'id', 'estado_id');
    }
}
