<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluation';
    use HasFactory;
    protected $fillable = [
        'id_stage',
        'type_evaluation',
        'note',
        'remarque',
    ];
}

