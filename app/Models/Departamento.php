<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $fillable = [
      
        'name'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    //Relacion uno a muchos
    public function municipios(){
        return $this->hasMany(Municipio::class);
    }

    public function ordenes(){
        return $this->hasMany(Orden::class);
    }
}
