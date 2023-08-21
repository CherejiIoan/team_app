<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eveniment extends Model
{
    use HasFactory;
    protected $table = 'evenimente';

    protected $fillable = 
    [
        'nume_eveniment',
        'data_eveniment',
        'ora_eveniment',
        'recurenta',
        'tip_eveniment_id',
        'notite'    
    ]; 

    public function tipEveniment()
    {
        return $this->belongsTo(TipEveniment::class, 'tip_eveniment_id');
    }
    public function evenimentUsers()
{
    return $this->hasMany(EvenimentUser::class);
}
}
