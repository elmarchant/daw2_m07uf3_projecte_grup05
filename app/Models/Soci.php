<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soci extends Model
{
    use HasFactory;

    protected $table = 'soci';

    protected $fillable = ['nif', 'nom', 'cognom', 'correu', 'mobil', 'tel_fixa', 'adreca', 'poblacio', 'commarca'];

    public $timestamps = false;
}
