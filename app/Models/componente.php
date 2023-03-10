<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class componente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_componentes',
        'nombre',
        'descripcion',
        'serial',
        'urlImage'
    ];

    public function componentes_servicios(){
        return $this->belongsTo(componentes_servicio::class,'id_componentes','id_componentes');
    }

}
