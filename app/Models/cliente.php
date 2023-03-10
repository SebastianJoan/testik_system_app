<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_clientes',
        'nombre',
        'urlImage',
        'descripcion'
    ];

    public function servicios(){
        return $this->HasMany(servicio::class,'id_clientes','id_clientes');
    }

}
