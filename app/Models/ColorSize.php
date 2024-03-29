<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorSize extends Model
{
    use HasFactory;

    protected $table = 'color_size';

    //relacion con colores es unos a muchos inversa
    public function color(){
        return $this->belongsTo(Color::class);
    }

    //relacion uno a muchos inversa con Size
    public function size(){
        return $this->belongsTo(Size::class);
    }



}
