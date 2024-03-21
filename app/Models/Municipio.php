<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cost', 'departamento_id'];

    // public function districts(){
    //     return $this->hasMany(District::class);
    // }

    public function ordenes(){
        return $this->hasMany(Orden::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
