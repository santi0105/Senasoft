<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 *
 * @property $id
 * @property $asiste
 * @property $id_users
 * @property $id_eventos
 * @property $created_at
 * @property $updated_at
 *
 * @property Evento $evento
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistencia extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['asiste', 'id_users', 'id_eventos'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo(\App\Models\Evento::class, 'id_eventos', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_users', 'id');
    }
    
}
