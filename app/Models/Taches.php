<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taches extends Model
{
    protected $table ='tache';
    
    protected $fillable = [
        'intitule',
        'id_stage',
          'statut',
    ];  
          use HasFactory;

          public function statut()
    {
        return $this->belongsTo(Statut::class,'statut','id');
    }
}
