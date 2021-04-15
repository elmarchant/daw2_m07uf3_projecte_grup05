<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'nom_usuari', 'contrasenya', 'administrador', 'activo'];

    public $timestamps = false;
}
