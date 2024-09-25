<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrega
 *
 * @property $id
 * @property $id_alquileres
 * @property $valorPagar
 * @property $tarifaAdicional
 * @property $created_at
 * @property $updated_at
 *
 * @property Alquilere $alquilere
 * @property Estadistica[] $estadisticas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Entrega extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_alquileres', 'valorPagar', 'tarifaAdicional','totalPagar'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alquilere()
    {
        return $this->belongsTo(\App\Models\Alquilere::class, 'id_alquileres', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estadisticas()
    {
        return $this->hasMany(\App\Models\Estadistica::class, 'id', 'id_entregas');
    }
    
}
