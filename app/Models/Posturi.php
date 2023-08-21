<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posturi extends Model
{
    use HasFactory;

    protected $table = 'functions';
    protected $fillable = ['nume']; 
    public function tip_eveniment()
    {
        return $this->belongsToMany(TipEveniment::class, 'tipuri_evenimente_posturi', 'evenimente_id', 'functions_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,  'function_user', 'function_id', 'user_id');
    }
    public function departaments()
    {
        return $this->belongsToMany(Departament::class, 'departament_function','departament_id','function_model_id');
    }
}
