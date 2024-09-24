<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Centro
 *
 * @property $id
 * @property $nombre
 * @property $regional
 * @property $latitud
 * @property $longitud
 * @property $created_at
 * @property $updated_at
 *
 * @property Bicicleta[] $bicicletas
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Centro extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'regional', 'latitud', 'longitud'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bicicletas()
    {
        return $this->hasMany(\App\Models\Bicicleta::class, 'id', 'id_centros');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'id', 'id_centros');
    }
    
}
