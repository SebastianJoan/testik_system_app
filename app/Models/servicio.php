<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_servicios',
        'id_clientes',
        'lugar',
        'descripcion'
    ];

    public function cliente(){
        return $this->belongsTo(cliente::class,'id_clientes','id_clientes');
    }

    public function componentes_servicio(){
        return $this->hasMany(componentes_servicio::class,'id_servicios','id_servicios');
    }

}
