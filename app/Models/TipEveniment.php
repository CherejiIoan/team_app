<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipEveniment extends Model
{
    use HasFactory;

    protected $table = 'tipuri_evenimente';
    protected $fillable = ['nume']; 
    public function departamente()
    {
        return $this->belongsToMany(Departament::class, 'tipuri_evenimente_departamente', 'eveniment_id', 'departament_id');
    }
    public function evenimente()
    {
        return $this->hasMany(Eveniment::class, 'tip_eveniment_id');
    }

}
