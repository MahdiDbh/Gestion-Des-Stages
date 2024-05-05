<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluation';
    use HasFactory;
    protected $fillable = [
        'id',
        'id_stage',
        'type_evaluation',
        'note',
        'remarque',
        'id_etudiant',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'id_etudiant','id');
    }


        
    
}

