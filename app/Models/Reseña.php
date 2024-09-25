<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseña extends Model
{
    use HasFactory;

    protected $fillable = ['id_bicicletas', 'id_users', 'comentario', 'calificacion'];

    public function bicicleta()
    {
        return $this->belongsTo(Bicicleta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
