<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stage extends Model
{
    protected $table = 'stage';
    use HasFactory;
    // protected $guarded = ['id_encadrant'];
    protected $fillable = [
        'id_encadrant',
        'id_sujet',
        'statut',
    ];

}
