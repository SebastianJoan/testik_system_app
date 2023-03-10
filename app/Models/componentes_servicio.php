<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class componentes_servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_componente_servicio',
        'id_servicios',
        'id_componentes',
    ];

    public function componentes(){
        return $this->hasMany(componente::class,'id_componentes','id_componentes');
    }

    public function servicios(){
        return $this->hasMany(servicio::class,'id_servicios','id_servicios');
    }

}
