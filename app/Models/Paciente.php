<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    static $rules= [
        'cedula' => 'required',
        'nombres' => 'required',
        'apellidos' => 'required',
        'fecha_nacimiento' => 'required',
        'edad' => 'required',
        'sexo' => 'required',
        'telefono' => '',
        'direccion' => '',
        'correo' => '',
        'observacion' => '',
        'status' => '',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function resultados()
    {
        return $this->hasMany(Resultados::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('Y-m-d h:m:s');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('Y-m-d h:m:s');
    }

    public function getFechaNacimientoAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['fecha_nacimiento'])->format('Y-m-d');
    }

    /* public function getAgeAttribute()
    {
	
        $nacimiento = $this->attributes['fecha_nacimiento'].' 00:00:00';

        $actual = \Carbon\Carbon::now();

        return $actual->diffForHumans($nacimiento, $actual);

    } */

}
