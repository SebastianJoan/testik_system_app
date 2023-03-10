<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cargo',
        'cargo',
        'descripcion',
    ];

    public function responsables(){
        return $this->hasMany(responsable::class,'id_cargo','id_cargo');
    }

}
