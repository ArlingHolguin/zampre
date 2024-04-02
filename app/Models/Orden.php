<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    const PENDIENTE = 1;
    const RECIBIDO = 2;
    const ENVIADO = 3;
    const ENTREGADO = 4;
    const ANULADO = 5;
    const PERDIDO = 6;
    const DEVUELTO = 7;


    //Relacion uno a muchos inversa
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }

    // public function district(){
    //     return $this->belongsTo(District::class);
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }

      //uno a muchos polimorfica image
      public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
