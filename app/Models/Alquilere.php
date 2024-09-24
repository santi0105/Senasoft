<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alquilere
 *
 * @property $id
 * @property $fechaInicial
 * @property $fechaFinal
 * @property $tpAlquiler
 * @property $id_users
 * @property $id_bicicletas
 * @property $created_at
 * @property $updated_at
 *
 * @property Bicicleta $bicicleta
 * @property User $user
 * @property Entrega[] $entregas
 * @property Estadistica[] $estadisticas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alquilere extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fechaInicial', 'fechaFinal', 'tpAlquiler', 'id_users', 'id_bicicletas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bicicleta()
    {
        return $this->belongsTo(\App\Models\Bicicleta::class, 'id_bicicletas', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_users', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entregas()
    {
        return $this->hasMany(\App\Models\Entrega::class, 'id', 'id_alquileres');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estadisticas()
    {
        return $this->hasMany(\App\Models\Estadistica::class, 'id', 'id_alquileres');
    }
    
}
