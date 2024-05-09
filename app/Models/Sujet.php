<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
 protected $table ='sujet';
    use HasFactory;
    // protected $guareded = [];
    protected $fillable = [
        'id_encadrant',
        'intitule',
        'description_sujet',    
        'valide',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_encadrant','id');
    }

    public function status()
    {
        return $this->belongsTo(Statut::class,'valide','id');
    }
}
