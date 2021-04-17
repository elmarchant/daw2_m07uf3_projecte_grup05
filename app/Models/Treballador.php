<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treballador extends Model
{
    use HasFactory;

    protected $table = 'treballador';

    protected $fillable = ['nif', 'nom', 'cognom', 'correu', 'mobil', 'tel_fixa', 'adreca', 'poblacio', 'commarca', 'data_ingres', 'cif'];

    public $timestamps = false;
}
