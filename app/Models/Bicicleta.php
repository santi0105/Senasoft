<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bicicleta
 *
 * @property $id
 * @property $img
 * @property $marca
 * @property $color
 * @property $estado
 * @property $precioHora
 * @property $id_centros
 * @property $created_at
 * @property $updated_at
 *
 * @property Centro $centro
 * @property Alquilere[] $alquileres
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bicicleta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['img', 'marca', 'color', 'estado', 'precioHora', 'id_centros'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function centro()
    {
        return $this->belongsTo(\App\Models\Centro::class, 'id_centros', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alquileres()
    {
        return $this->hasMany(\App\Models\Alquilere::class, 'id', 'id_bicicletas');
    }
    
}
