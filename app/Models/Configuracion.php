<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;
    
    static $rules= [
        'nombre_organizacion' => 'required',
        'representante_organizacion' => 'required',
        'representante_cargo' => 'required',
        'direccion' => 'required',
        'telefono_uno' => 'required',
        'telefono_dos' => 'required',
        'correo' => 'required',
        'copyright' => 'required',
    ];

    protected $guarded = [];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('Y-m-d h:m:s');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('Y-m-d h:m:s');
    }
}
