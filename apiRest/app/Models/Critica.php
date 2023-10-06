<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critica extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=['id', 'id_cliente', 'id_videojuego','critica'];

    public function critica()
    {
        return $this->hasMany('App\videojuego', 'id', 'id');
    }
}
