<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associacio extends Model
{
    use HasFactory;

    protected $table = 'associacio';

    protected $fillable = ['cif', 'nom','adreca', 'poblacio', 'commarca', 'declaracio', 'tipus'];

    public $timestamps = false;
}
