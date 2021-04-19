<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vincle extends Model
{
    use HasFactory;

    protected $table = 'formen';

    protected $fillable = ['cif', 'nif', 'data_associacio', 'quota'];

    public $timestamps = false;
}
