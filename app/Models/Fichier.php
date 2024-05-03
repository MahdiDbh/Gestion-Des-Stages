<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    protected $table = 'fichier';
    use HasFactory;
    // protected $guareded = [];
    protected $fillable = [
        'id',
        'id_stage',
        'path_memoire',
        'path_code',
    ];


}
