<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estadistica
 *
 * @property $id
 * @property $id_alquileres
 * @property $id_entregas
 * @property $created_at
 * @property $updated_at
 *
 * @property Alquilere $alquilere
 * @property Entrega $entrega
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estadistica extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_alquileres', 'id_entregas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alquilere()
    {
        return $this->belongsTo(\App\Models\Alquilere::class, 'id_alquileres', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entrega()
    {
        return $this->belongsTo(\App\Models\Entrega::class, 'id_entregas', 'id');
    }
    
}
