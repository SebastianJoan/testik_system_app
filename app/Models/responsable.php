<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class responsable extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_responsable',
        'id_cargo',
        'nombre',
        'urlImage',
    ];

    public function cargo(){
        return $this->belongsTo(cargo::class,'id_cargo','id_cargo');
    }

}
