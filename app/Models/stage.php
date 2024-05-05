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
    public function statut()
    {
        return $this->belongsTo(Statut::class,'statut','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_encadrant','id');
    }
    public function sujet()
    {
        return $this->belongsTo(Sujet::class,'id_sujet','id');
    }


   
}
