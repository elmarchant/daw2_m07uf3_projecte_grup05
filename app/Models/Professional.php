<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $table = 'professional';

    protected $fillable = ['nif', 'carrec', 'desc_irpf', 'quantitat_seguretat_social'];

    public $timestamps = false;
}
