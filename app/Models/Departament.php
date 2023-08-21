<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;

    protected $table = 'departamente';
    protected $fillable = ['nume']; 
    
    public function functions()
    {
        return $this->belongsToMany(Posturi::class, 'departament_function','departament_id','function_model_id');
    }
}